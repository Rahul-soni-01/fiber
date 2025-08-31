<?php

namespace App\Http\Controllers;

use App\Models\AssignItem;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use Illuminate\Http\Request;

class AssignItemController extends Controller
{
    public function index()
    {
        $assignItems = AssignItem::with('SubCategory')->get();
          $categories = tbl_category::all();
          $subCategories = tbl_sub_category::with('category')->get();
        return view('assign_items.index', compact('assignItems','categories', 'subCategories'));
    }

    public function create()
    {
          $categories = tbl_category::all();
          $subCategories = tbl_sub_category::with('category')->get();
          return view('assign_items.create', compact('categories', 'subCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'temp' => 'nullable|string',
            'sr_no_fiber' => 'nullable|string',
          //   'cid' => 'required|integer',
            'scid' => 'required|integer',
            'qty' => 'required|integer',
            'sr_no' => 'nullable|string',
            'emp' => 'nullable|string',
        ]);

        AssignItem::create($request->all());

        return redirect()->route('assign-items.index')->with('success', 'Assign Item created successfully.');
    }

    public function show(AssignItem $assignItem)
    {
        return view('assign_items.show', compact('assignItem'));
    }

    public function edit(AssignItem $assignItem)
    {
          $subCategories = tbl_sub_category::with('category')->get();
          return view('assign_items.edit', compact('assignItem','subCategories'));
    }

    public function update(Request $request, AssignItem $assignItem)
    {
        $request->validate([
            'temp' => 'nullable|string',
            'sr_no_fiber' => 'nullable|string',
          //   'cid' => 'required|integer',
            'scid' => 'required|integer',
            'qty' => 'required|integer',
            'sr_no' => 'nullable|string',
            'emp' => 'nullable|string',
        ]);

        $assignItem->update($request->all());

        return redirect()->route('assign-items.index')->with('success', 'Assign Item updated successfully.');
    }

    public function destroy(AssignItem $assignItem)
    {
        $assignItem->delete();

        return redirect()->route('assign-items.index')->with('success', 'Assign Item deleted successfully.');
    }
}
