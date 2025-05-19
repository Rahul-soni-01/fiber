<?php

namespace App\Http\Controllers;

use App\Models\ReportPermission;
use Illuminate\Http\Request;

class ReportPermissionController extends Controller
{
    // Show all records
    public function index()
    {
        $permissions = ReportPermission::all();
        return view('report_permission.index', compact('permissions'));
    }

    // Show form to create new
    public function create()
    {
        return view('report_permission.create');
    }

    // Store new record
    public function store(Request $request)
    {
        $request->validate([
            'user_type' => 'required|string',
            'field_name' => 'required|array',
        ]);

        ReportPermission::create([
            'user_type' => $request->user_type,
            'field_name' => $request->field_name,
        ]);

        return redirect()->route('report-permission.index')
            ->with('success', 'Report Permission created successfully.');
    }

    // Show single record
    public function show($id)
    {
        $permission = ReportPermission::findOrFail($id);
        return view('report_permission.show', compact('permission'));
    }

    // Show form to edit record
    public function edit($id)
    {
        $permission = ReportPermission::findOrFail($id);
        return view('report_permission.edit', compact('permission'));
    }

    // Update record
    public function update(Request $request, $id)
    {
        $permission = ReportPermission::findOrFail($id);

        $request->validate([
            'user_type' => 'required|string',
            'field_name' => 'required|array',
        ]);

        $permission->update($request->only('user_type', 'field_name'));

        return redirect()->route('report-permission.index')
            ->with('success', 'Report Permission updated successfully.');
    }

    // Delete record
    public function destroy($id)
    {
        $permission = ReportPermission::findOrFail($id);
        $permission->delete();

        return redirect()->route('report-permission.index')
            ->with('success', 'Report Permission deleted successfully.');
    }
}
