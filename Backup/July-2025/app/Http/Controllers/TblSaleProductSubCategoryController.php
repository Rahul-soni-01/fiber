<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblSaleProductSubCategory;
use App\Models\TblSaleProductCategory;

class TblSaleProductSubCategoryController extends Controller
{
    public function index()
    {
        $subcategories = TblSaleProductSubCategory::all();
        $categories = TblSaleProductCategory::all();
        return view('saleproductsubcategory.index', compact('categories','subcategories'));
    }
    public function create()
    {
        $categories = TblSaleProductCategory::all();
        return view('saleproductsubcategory.create', compact('categories'));
    }
    public function store(Request $request)
    {
        // dd($request->all()\
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'spcid' => 'required|exists:tbl_sale_product_category,id',
            'unit' => 'nullable|string|max:255',
            'sr_no' => 'nullable|integer',
        ]);
        $validatedData['sr_no'] = $request->has('enable_sr_no') ? $request->sr_no : null;

        TblSaleProductSubCategory::create($validatedData);
        return redirect()->route('saleproductsubcategory.index')->with('success', 'Subcategory created successfully.');
    }
    public function show($id)
    {
        $category = TblSaleProductSubCategory::findOrFail($id);
        return view('saleproductsubcategory.show', compact('category'));
    }
    public function edit($id)
    {
        $subcategory = TblSaleProductSubCategory::findOrFail($id);
        $categories = TblSaleProductCategory::all();
        return view('saleproductsubcategory.edit', compact('subcategory', 'categories'));
    }
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $subcategory = TblSaleProductSubCategory::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'spcid' => 'required|exists:tbl_sale_product_category,id',
            'unit' => 'nullable|string|max:255',
            'sr_no' => 'nullable|integer',
        ]);
        $validatedData['sr_no'] = $request->has('sr_no') ? $request->sr_no : 0;
        // dd($validatedData);

        $subcategory->update($validatedData);

        return redirect()->route('saleproductsubcategory.index')->with('success', 'Subcategory updated successfully.');
    }
    public function destroy($id)
    {
        $subcategory = TblSaleProductSubCategory::findOrFail($id);
        $subcategory->delete();

        return redirect()->route('saleproductsubcategory.index')->with('success', 'Subcategory deleted successfully.');
    }
}
