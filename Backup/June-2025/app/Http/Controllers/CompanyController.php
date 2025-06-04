<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
     public function index()
     {
          $companies = Company::latest()->paginate(10);
          return view('company.index', compact('companies'));
     }

     public function create()
     {
          return view('company.create');
     }

     public function store(Request $request)
     {
          $validated = $request->validate([
               'name' => 'required|string|max:100',
               'tax_id' => 'nullable|string|max:50',
               'address' => 'nullable|string',
               'is_active' => 'boolean'
          ]);

          Company::create($validated);

          return redirect()->route('companies.index')
               ->with('success', 'Company created successfully');
     }

     public function show(Company $company)
     {
          return view('company.show', compact('company'));
     }

     public function edit(Company $company)
     {
          return view('company.edit', compact('company'));
     }

     public function update(Request $request, Company $company)
     {
          $validated = $request->validate([
               'name' => 'sometimes|string|max:100',
               'tax_id' => 'sometimes|string|max:50',
               'address' => 'sometimes|string',
               'is_active' => 'sometimes|boolean'
          ]);

          $company->update($validated);

          return redirect()->route('companies.index')
               ->with('success', 'Company updated successfully');
     }

     public function destroy(Company $company)
     {
          $company->delete();

          return redirect()->route('companies.index')
               ->with('success', 'Company deleted successfully');
     }
}
