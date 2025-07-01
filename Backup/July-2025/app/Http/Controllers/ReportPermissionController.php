<?php

namespace App\Http\Controllers;

use App\Models\ReportPermission;
use Illuminate\Http\Request;
use App\Models\tbl_user;


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

        $user_types = tbl_user::where('type', '!=', 'admin')->select('type')->distinct()->pluck('type');

        return view('report_permission.create', compact('user_types'));
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
        $reportPermission = ReportPermission::findOrFail($id);
        return view('report_permission.show', compact('reportPermission'));
    }

    // Show form to edit record
    public function edit($id)
    {
        $reportPermission = ReportPermission::findOrFail($id);

        $user_types = tbl_user::where('type', '!=', 'admin')
            ->select('type')
            ->distinct()
            ->pluck('type');

        return view('report_permission.edit', compact('reportPermission', 'user_types'));
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
