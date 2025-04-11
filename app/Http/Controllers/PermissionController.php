<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
use App\Models\Report;
use App\Models\TblStock;

class PermissionController extends Controller
{
    public function index()
    {
        // Fetch all permissions from the database
        $permissions = Permission::all();

        // Pass the permissions to the view
        return view('permissions.index', compact('permissions'));
    }

    //  Rest of function use 4 BadDesk
    public function create(Request $request, $id)
    {
        $reports = Report::with('reportItems', 'tbl_type', 'reportItems.tbl_sub_category')->where('sr_no_fiber', $id)->get();
        // dd($reports);
        return view('baddesk.create', compact('reports', 'id'));
    }

    public function store(Request $request)
    {
        try {
            foreach ($request->report_id as $reportId) {
                foreach ($request->tblstock_id as $index => $tblstockId) {
                    $tblstock = TblStock::find($tblstockId);

                    if (!$tblstock) {
                        return redirect()->back()->with('error', 'Stock item not found.');
                    }

                    $tblstock->dead_status = $request->dead_status[$index] ?? null;
                    $tblstock->status = 0;
                    $tblstock->save();
                }

                $report = Report::find($reportId);
                if (!$report) {
                    return redirect()->back()->with('error', 'Report not found.');
                }

                $report->section = 3;
                $report->save();
            }

            return redirect()->route('baddesk.section')->with('success', 'Move to Bad Desk successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
}
