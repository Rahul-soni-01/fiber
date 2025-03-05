<?php

namespace App\Http\Controllers;

use App\Models\tbl_sub_category;
use App\Models\tbl_category;
use App\Models\TblSaleProductSubCategory;
use App\Models\TblSaleProductCategory;
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

            return view('subcategory.index', ['subCategories' => $subCategories]);
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $categories = tbl_category::all();
            return view('subcategory.create',compact('categories'));
        }
        return redirect('/unauthorized');
    }



    /**
     * Display the specified resource.
     */
    public function store(tbl_sub_category $tbl_sub_category, Request $request)
    {
        $rules = [
            'category' => 'required',
            'sub_category' => 'required|string|max:255',
            'unit' => 'required|string|in:Pic,Mtr',
        ];
        
        $validatedData = $request->validate($rules);
        
        // dd($request->all());
        $sellable = $request->has('is_sellable') ? $request->is_sellable : 0;
        $cid = tbl_category::where('category_name',$request->category)->first()->id;
        $spcid = TblSaleProductCategory::where('name',$request->category)->first()->id ?? null;
        // dd($spcid);

        $subcategory = new tbl_sub_category();
        $subcategory->cid = $cid;
        $subcategory->sub_category_name = $request->sub_category;
        $subcategory->unit = $request->unit;
        $subcategory->sr_no = $request->sr_no;
        $subcategory->is_sellable = $request->has('is_sellable') ? $request->is_sellable : 0;
        $result = $subcategory->save();

        if($sellable == '1'){    
            if($spcid){
                $Salecategory = new TblSaleProductSubCategory();
                $Salecategory->spcid = $spcid;
                $Salecategory->name = $request->sub_category;
                $Salecategory->unit = $request->unit;
                $Salecategory->sr_no = $request->sr_no;
                $Salecategory->save();
            }else{
                return redirect()->back()->with('error', '!! Failed to add subcategory !!  ');
            }
        }
        if ($result) {
            return redirect()->route('subcategory.index')->with('success', 'Category added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add subcategory!');
        }
    }

    public function edit(tbl_sub_category $tbl_sub_category,Request $request, $id)
    {
        if ($this->checkPermission($request, 'edit')) {

            $categories = tbl_category::all();

            $subcategory = tbl_sub_category::findOrFail($id);
            return view('subcategory.edit', compact('subcategory','categories'));
            }
        return redirect('/unauthorized');
    }

    public function update(Request $request, tbl_sub_category $tbl_sub_category,$id)
    {
        $request->validate([
            'cid' => 'required|exists:tbl_categories,id', // Check if the category exists in the categories table
            'sub_category_name' => 'required|string|max:255',
            'unit' => 'required|string|in:Pic,Mtr',
            'sr_no' => 'nullable|boolean', // It will be 1 or 0
        ]);
    
        $subcategory = tbl_sub_category::findOrFail($id);
    
        $subcategory->cid = $request->input('cid');
        $subcategory->sub_category_name = $request->input('sub_category_name');
        $subcategory->unit = $request->input('unit');
        $subcategory->sr_no = $request->input('sr_no', 0);
        $subcategory->is_sellable = $request->has('is_sellable') ? $request->is_sellable : 0;
        $subcategory->save();
    
        // Redirect the user back with a success message
        return redirect()->route('subcategory.index')->with('success', 'Subcategory updated successfully!');
    }

    public function destroy(tbl_sub_category $tbl_sub_category,$id,Request $request )
    {
        if ($this->checkPermission($request, 'delete')) {
            $party = $tbl_sub_category->find($id);
            $party->delete();
            return redirect()->route('subcategory.index')->with('success', 'Subcategory Deleted Successfully.');
        }
        return redirect('/unauthorized');
    }
}
