<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estimate;

class EstimateController extends Controller
{
    public function index()
    {
        $estimates = Estimate::all();
        return view('estimates.index', compact('estimates'));
    }

    // Show form to create a new estimate
    public function create()
    {
        return view('estimates.create');
    }

    // Store a new estimate
    public function store(Request $request)
    {
        $request->validate([
            'in_date' => 'nullable|date',
            'sr_no' => 'nullable|string',
            'price' => 'nullable|numeric',
            'cid' => 'nullable|string',
        ]);

        Estimate::create($request->all());

        return redirect()->route('estimates.index')->with('success', 'Estimate created successfully');
    }

    // Show a single estimate
    public function show($id)
    {
        $estimate = Estimate::findOrFail($id);
        return view('estimates.show', compact('estimate'));
    }

    // Show form to edit an estimate
    public function edit($id)
    {
        $estimate = Estimate::findOrFail($id);
        return view('estimates.edit', compact('estimate'));
    }

    // Update an estimate
    public function update(Request $request, $id)
    {
        $estimate = Estimate::findOrFail($id);

        $request->validate([
            'in_date' => 'nullable|date',
            'sr_no' => 'nullable|string',
            'price' => 'nullable|numeric',
            'cid' => 'nullable|string',
        ]);

        $estimate->update($request->all());

        return redirect()->route('estimates.index')->with('success', 'Estimate updated successfully');
    }

    // Delete an estimate
    public function destroy($id)
    {
        $estimate = Estimate::findOrFail($id);
        $estimate->delete();

        return redirect()->route('estimates.index')->with('success', 'Estimate deleted successfully');
    }
}
