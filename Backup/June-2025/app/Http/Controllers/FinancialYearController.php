<?php

namespace App\Http\Controllers;

use App\Models\FinancialYear;
use Illuminate\Http\Request;

class FinancialYearController extends Controller
{
     // Show all financial years
     public function index()
     {
          $financialYears = FinancialYear::all();
          return view('financial_years.index', compact('financialYears'));
     }

     // Show form to create a new financial year
     public function create()
     {
          return view('financial_years.create');
     }

     // Store new financial year
     public function store(Request $request)
     {
          $request->validate([
               'name'       => 'required|string|unique:tbl_acc_financial_years,name',
               'start_date' => 'required|date|unique:tbl_acc_financial_years,start_date',
               'end_date'   => 'required|date|after_or_equal:start_date',
               'is_active'  => 'required|in:0,1',
          ]);

          // Deactivate all others if this one is active
          if ($request->is_active == 1) {
               FinancialYear::where('is_active', 1)->update(['is_active' => 0]);
          }

          FinancialYear::create($request->all());

          return redirect()->route('financial-years.index')
               ->with('success', 'Financial year created successfully.');
     }

     // Show single financial year (optional view)
     public function show($id)
     {
          $financialYear = FinancialYear::findOrFail($id);
          return view('financial_years.show', compact('financialYear'));
     }

     // Show form to edit financial year
     public function edit($id)
     {
          $financialYear = FinancialYear::findOrFail($id);
          return view('financial_years.edit', compact('financialYear'));
     }

     // Update financial year
     public function update(Request $request, $id)
     {
          $financialYear = FinancialYear::findOrFail($id);

          $request->validate([
               'name'       => 'required|string|unique:tbl_acc_financial_years,name,' . $id,
               'start_date' => 'required|date|unique:tbl_acc_financial_years,start_date,' . $id,
               'end_date'   => 'required|date|after_or_equal:start_date',
               'is_active'  => 'required|in:0,1',
          ]);

          if ($request->is_active == 1) {
               FinancialYear::where('is_active', 1)
                    ->where('id', '!=', $id)
                    ->update(['is_active' => 0]);
          }

          $financialYear->update($request->all());

          return redirect()->route('financial-years.index')
               ->with('success', 'Financial year updated successfully.');
     }

     // Delete financial year
     public function destroy($id)
     {
          $financialYear = FinancialYear::findOrFail($id);
          $financialYear->delete();

          return redirect()->route('financial-years.index')
               ->with('success', 'Financial year deleted successfully.');
     }
}
