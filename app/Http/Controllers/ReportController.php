<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\TblLed;
use App\Models\TblStock;
use Illuminate\Support\Facades\Validator;
use App\Models\tbl_sub_category;

class ReportController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Report ?? [];
        return in_array($action, $permissions);
    }

    public function index(Request $request){
        if ($this->checkPermission($request, 'view')) {
            $reports = Report::with('tbl_leds')->get();
            // dd($reports);            
            return view("report.index",compact('reports'));
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request){
        if ($this->checkPermission($request, 'add')) {
            $sub_categories = tbl_sub_category::where('cid',1 )->get();
           
            return view("report.create",compact('sub_categories'));
        }
        return redirect('/unauthorized');
    }

    public function store(Request $request){
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'part' => 'required|numeric',
            'worker_name' => 'required|string|max:255',
            'sr_no_fiber' => 'required|string|max:255',
            'm_j' => 'required|string|max:255',
            'type' => 'required|numeric',
            'sr_card' => 'required|string|max:255',
            'serial_no' => 'required|array',
            'ampled' => 'required|array',
            'voltled' => 'required|array',
            'wattled' => 'required|array',
            'sr_isolator' => 'required|string|max:255',
            'sr_aom_qswitch' => 'required|string|max:255',
            'amp_aom_qswitch' => 'required|string|max:255',
            'volt_aom_qswitch' => 'required|string|max:255',
            'watt_aom_qswitch' => 'required|string|max:255',
            'sr_cavity_nani' => 'required|string|max:255',
            'sr_cavity_moti' => 'required|string|max:255',
            'sr_combiner_3_1' => 'required|string|max:255',
            'amp_combiner_3_1' => 'required|string|max:255',
            'volt_combiner_3_1' => 'required|string|max:255',
            'watt_combiner_3_1' => 'required|string|max:255',
            'sr_couplar_2_2' => 'required|string|max:255',
            'amp_couplar_2_2' => 'required|string|max:255',
            'volt_couplar_2_2' => 'required|string|max:255',
            'watt_couplar_2_2' => 'required|string|max:255',
            'sr_hr' => 'required|string|max:255',
            'sr_fiber_nano' => 'required|string|max:255',
            'sr_fiber_moto' => 'required|string|max:255',
            'output_amp' => 'required|string|max:255',
            'output_volt' => 'required|string|max:255',
            'nani_cavity' => 'required|string|max:255',
            'final_cavity' => 'required|string|max:255',
            'note1' => 'nullable|string|max:255',
            'note2' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $report = new Report();
        // Assign each field
        $report->worker_name = $request->input('worker_name');
        $report->sr_no_fiber = $request->input('sr_no_fiber');
        $report->m_j = $request->input('m_j');
        $report->type = $request->input('type');
        $report->sr_card = $request->input('sr_card');
        // $report->sr_led = json_encode($ledIds); 
        $report->sr_isolator = $request->input('sr_isolator');
        $report->sr_aom_qswitch = $request->input('sr_aom_qswitch');
        $report->amp_aom_qswitch = $request->input('amp_aom_qswitch');
        $report->volt_aom_qswitch = $request->input('volt_aom_qswitch');
        $report->watt_aom_qswitch = $request->input('watt_aom_qswitch');
        $report->sr_cavity_nani = $request->input('sr_cavity_nani');
        $report->sr_cavity_moti = $request->input('sr_cavity_moti');
        $report->sr_combiner_3_1 = $request->input('sr_combiner_3_1');
        $report->amp_combiner_3_1 = $request->input('amp_combiner_3_1');
        $report->volt_combiner_3_1 = $request->input('volt_combiner_3_1');
        $report->watt_combiner_3_1 = $request->input('watt_combiner_3_1');
        $report->sr_couplar_2_2 = $request->input('sr_couplar_2_2');
        $report->amp_couplar_2_2 = $request->input('amp_couplar_2_2');
        $report->volt_couplar_2_2 = $request->input('volt_couplar_2_2');
        $report->watt_couplar_2_2 = $request->input('watt_couplar_2_2');
        $report->sr_hr = $request->input('sr_hr');
        $report->sr_fiber_nano = $request->input('sr_fiber_nano');
        $report->sr_fiber_moto = $request->input('sr_fiber_moto');
        $report->output_amp = $request->input('output_amp');
        $report->output_volt = $request->input('output_volt');
        $report->output_watt = $request->input('output_watt');
        $report->nani_cavity = $request->input('nani_cavity');
        $report->final_cavity = $request->input('final_cavity');
        $report->note1 = $request->input('note1');
        $report->note2 = $request->input('note2');
        // $report->remark = $request->input('remark');
        // $report->status = $request->input('status');
        // $report->part = $request->input('part');
        // $report->temp = $request->input('temp');
        // $report->r_status = $request->input('r_status');
        // $report->f_status = $request->input('f_status');
        // $report->party_name = $request->input('party_name');
    
        $report->save();
        $report_id = $report->id;
       
        foreach ($request->serial_no as $index => $serial_no) {
            
            $existingRecord = TblStock::where('serial_no', $serial_no)->first();

            if($existingRecord){
                // $invoice_no =$existingRecord->invoice_no;
                $existingRecord->status = 1;
                $existingRecord->save();
            }

            $tbl_led = new TblLed();
            $tbl_led->scid = $request->sub_category[$index]; 
            $tbl_led->report_id = $report_id; 
            $tbl_led->sr_led = $serial_no;
            $tbl_led->amp_led = $request->ampled[$index] ?? null; 
            $tbl_led->volt_led = $request->voltled[$index] ?? null;  
            $tbl_led->watt_led = $request->wattled[$index] ?? null;
            $tbl_led->save();
        }
        if ($report->save()) {
            return redirect()->route('report.index')->with('success', 'Report added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to store the report. Please try again.');
        }
       
    }
}