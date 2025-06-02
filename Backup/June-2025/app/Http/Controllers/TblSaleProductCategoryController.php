<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblSaleProductCategory;


class TblSaleProductCategoryController extends Controller
{
    public function index()
    {
        $categories = TblSaleProductCategory::all();
        return view('saleproductcategory.index', compact('categories'));
    }
    public function create()
    {
        $categories = TblSaleProductCategory::all();
        return view('saleproductcategory.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_type' => 'nullable|boolean',
        ]);

        TblSaleProductCategory::create($validatedData);
        return redirect()->route('saleproductcategory.index')->with('success', 'Category created successfully.');
    }
    public function show($id)
    {
        $category = TblSaleProductCategory::findOrFail($id);
        return view('saleproductcategory.show', compact('category'));
    }
    public function edit($id)
    {
        $category = TblSaleProductCategory::findOrFail($id);
        return view('saleproductcategory.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'is_type' => 'nullable|string|max:255',
        ]);

        $category = TblSaleProductCategory::findOrFail($id);
        $category->update($validatedData);

        return redirect()->route('saleproductcategory.index')->with('success', 'Category updated successfully.');
    }
    public function destroy($id)
    {
        $category = TblSaleProductCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('saleproductcategory.index')->with('success', 'Category deleted successfully.');
    }
}
