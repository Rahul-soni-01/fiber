<?php

namespace App\Http\Controllers;

use App\Models\tbl_sub_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TblSubCategoryController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Category ?? [];
        return in_array($action, $permissions);
    }


    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $subCategories = tbl_sub_category::with('category')
                ->get() 
                ->map(function ($subCategory) {
                    return [
                        'id' => $subCategory->id,
                        'category_date' => $subCategory->category->created_at->toDateString(), 
                        'category_name' => $subCategory->category->category_name, 
                        'sub_category_date' => $subCategory->created_at->toDateString(),
                        'sub_category_name' => $subCategory->sub_category_name,
                        'unit' => $subCategory->unit,
                        'sr_no' => $subCategory->sr_no,
                    ];
                });

            return view('category.index', ['categories' => $subCategories]);
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request)
    {
        $rules = [
            'category' => 'required|integer',
            'sub_category' => 'required|string|max:255',
            'unit' => 'required|string|in:Pic,Mtr',
        ];

        if ($request->unit === 'Pic') {
            $rules['sr_no'] = 'required|integer';
        } else {
            $rules['sr_no'] = 'nullable';
        }

        $validatedData = $request->validate($rules);
        $subcategory = new tbl_sub_category();
        $subcategory->cid = $request->category;
        $subcategory->sub_category_name = $request->sub_category;
        $subcategory->unit = $request->unit;
        $subcategory->sr_no = $request->sr_no;
        $result = $subcategory->save();

        if ($result) {
            return redirect('add_category')->with('success', 'Subcategory added successfully!');
        } else {
            return redirect('add_category')->with('error', 'Failed to add subcategory!');
        }
    }

    public function show_category(Request $request)
    {
      
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_sub_category $tbl_sub_category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tbl_sub_category $tbl_sub_category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_sub_category $tbl_sub_category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_sub_category $tbl_sub_category)
    {
        //
    }
}
