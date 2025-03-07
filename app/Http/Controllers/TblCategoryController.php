<?php

namespace App\Http\Controllers;

use App\Models\tbl_category;
use App\Models\TblSaleProductCategory;
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
            $categories = tbl_category::all();
            return view('category.create', compact('categories'));

        }
        return redirect('/unauthorized');

    }

    public function store(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {

            $request->validate([
                'category_name' => 'required|string|unique:tbl_categories,category_name|max:255',
                'sr_no' => 'nullable|integer',
                'main_category' => 'required|string|max:255', // Added main_category validation
            ]);
            $sellable = $request->has('is_sellable') ? $request->is_sellable : 0;
            if($sellable == '1'){
                $validatedData = $request->validate([
                    'category_name' => 'required|string|max:255',
                ]);
                
                $Salecategory = new TblSaleProductCategory();
                $Salecategory->name = $validatedData['category_name'];
                $Salecategory->save();
            }
            $category = new tbl_category();
            $category->category_name = $request->category_name;
            $category->main_category = $request->main_category; // Assigning main_category
            $category->is_sellable = $sellable; // Saving is_sellable field
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'main_category' => 'required|string|max:255', // Added main_category validation
        ]);
    
        $sellable = $request->has('is_sellable') ? 1 : 0; // Ensuring it is stored as 1 or 0
    
        // Find category by ID
        $category = tbl_category::findOrFail($id);
        $category->category_name = $request->category_name;
        $category->main_category = $request->main_category; // Assigning main_category
        $category->is_sellable = $sellable; // Updating is_sellable status
        $result = $category->save();
    
        // If sellable, ensure it's also added to TblSaleProductCategory
        if ($sellable) {
            $existingSaleCategory = TblSaleProductCategory::where('name', $request->category_name)->first();
            if (!$existingSaleCategory) { // Avoid duplicate entries
                $saleCategory = new TblSaleProductCategory();
                $saleCategory->name = $request->category_name;
                $saleCategory->save();
            }
        } else {
            // Optionally, remove from TblSaleProductCategory if unchecked
            TblSaleProductCategory::where('name', $request->category_name)->delete();
        }
    
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
