<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use Illuminate\Http\Request;

class TblCategoryController extends Controller
{

    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Category ?? [];
        return in_array($action, $permissions);
    }

    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $categories = tbl_category::all();
            // dd($categories);
            return view('category.index', compact('categories'));
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            // $category = new tbl_category();
            return view('category.create');
        }
        return redirect('/unauthorized');

    }

    public function store(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {

            $request->validate([
                'category_name' => 'required|string|max:255',
            ]);
            $category = new tbl_category();
            $category->category_name = $request->category_name;

            $result = $category->save();
            if ($result) {
                return redirect()->route('category.index')->with('success', 'Category added successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to add category.');
            }
        }
        return redirect('/unauthorized');
    }

    public function show(tbl_category $tbl_category, Request $request)
    {
       

    }

    public function edit(tbl_category $tbl_category,$id,Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {

            $category = tbl_category::findOrFail($id);
            return view('category.edit', compact('category'));
            }
        return redirect('/unauthorized');
    }
    public function update(Request $request, tbl_category $tbl_category,$id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
        ]);

        $category = tbl_category::findOrFail($id);
        $category->category_name = $request->category_name;
        $result = $category->save();
    
        if ($result) {
            return redirect()->route('category.index')->with('success', 'Category updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update category.');
        }
    }

    public function destroy(tbl_category $tbl_category,$id,Request $request)
    {
        if ($this->checkPermission($request, 'delete')) {
            $party = $tbl_category->find($id);
            $party->delete();
            return redirect()->route('category.index')->with('success', 'category Deleted Successfully.');
        }
        return redirect('/unauthorized');
    }
}
