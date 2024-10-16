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

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $category = new tbl_category();
        $category->category_name = $request->category_name;

        $result = $category->save();

        if ($result) {
            return redirect('add_category');

        } else {
            return redirect('add_category');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_category $tbl_category, Request $request)
    {
       

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tbl_category $tbl_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_category $tbl_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_category $tbl_category)
    {
        //
    }
}
