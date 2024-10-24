<?php

namespace App\Http\Controllers;

use App\Models\tbl_party;
use App\Models\tbl_purchase;
use App\Models\tbl_purchase_item;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\TblLed;
use App\Models\TblCard;
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

    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $reports = Report::with('tbl_leds')->get();
            // dd($reports);            
            return view("report.index", compact('reports'));
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $sub_categories = tbl_sub_category::where('cid', 1)->get();
            $cards = tbl_sub_category::where('cid', 7)->get();

            return view("report.create", compact('sub_categories', 'cards'));
        }
        return redirect('/unauthorized');
    }

    public function store(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'part' => 'required|numeric',
            'warranty' => 'required|numeric',
            'worker_name' => 'required|string|max:255',
            'sr_no_fiber' => 'required|string|max:255',
            'm_j' => 'required|string|max:255',
            'type' => 'required|numeric',
            'card' => 'required|array',
            'sr_card' => 'required|array',
            'sr_cardamp' => 'required|array',
            'sr_cardvolt' => 'required|array',
            'sr_cardwatt' => 'required|array',
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
        $report->part = $request->input('part');
        $report->r_status = $request->input('warranty');
        $report->worker_name = $request->input('worker_name');
        $report->sr_no_fiber = $request->input('sr_no_fiber');
        $report->m_j = $request->input('m_j');
        $report->type = $request->input('type');
        $report->sr_card = $request->input('sr_card');
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
        $report->save();
        $report_id = $report->id;
        $amount = 0;

        // fiber in mate update tbl_stoke qty and upadte final amount as well...
        $sr_fiber_nano = $request->input('sr_fiber_nano');
        $sr_fiber_moto = $request->input('sr_fiber_moto');
        $final_fiber = $sr_fiber_moto + $sr_fiber_nano;
        if ($final_fiber) {
            $sub_category_name = tbl_sub_category::where('sub_category_name', 'Fiber')
                ->first();

            $sub_category_id = $sub_category_name->id;
            $category_id = $sub_category_name->cid;

            $TblStock = TblStock::where('scid', $sub_category_id)
                ->where('cid', $category_id)
                ->where('qty', '!=', 0)
                ->first();

            if ($TblStock) {
                $TblStock->qty = $TblStock->qty - $final_fiber;
                $TblStock->save();

                $amount += $final_fiber * $TblStock->priceofUnit;
            }
        }

        // sr_card in mate update tbl_stoke qty and upadte final amount and insert in tbl_cards if any serial number repeat then delete all insert id and delete report as well and redirct back as well...
        if (!empty($request->sr_card[0])) {
            $avalabile = 0;
            $TblStockinsertedIds = [];
            $TblcardinsertedIds = [];
            foreach ($request->sr_card as $index => $serial_no_card) {
                if ($serial_no_card) {
                    $sub_category_name = tbl_sub_category::where('id', $request->card[$index])
                        ->first();

                    $sub_category_id = $sub_category_name->id;
                    $category_id = $sub_category_name->cid;

                    $TblStock = TblStock::where('scid', $sub_category_id)
                        ->where('cid', $category_id)
                        ->where('qty', '!=', 0)
                        ->first();

                    if ($TblStock) {
                        $TblStock->qty = $TblStock->qty - $final_fiber;
                        $TblStock->save();

                        $amount += $final_fiber * $TblStock->priceofUnit;
                    }
                     else {
                        $party = tbl_party::where('party_name', 'opening stock')->first();
                        $party_id = $party->id;
                        $invoice = tbl_purchase::where('pid', $party_id)->first();
                        $invoice_no = $invoice->invoice_no;
                        $date = $invoice->date;
                        $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                            ->where('scid', $request->card[$index])
                            ->first();
                        $cid = $invoice_data->cid;

                        $serial_no_card_count = TblStock::where('invoice_no', $invoice_no)
                            ->where('scid', $request->sub_category[$index])
                            ->where('cid', $cid)
                            ->where('serial_no', $serial_no_card)
                            ->count();

                        if ($serial_no_card_count === 0) {
                            $newStock = TblStock::create([
                                'date' => $date,
                                'invoice_no' => $invoice_no,
                                'cid' => $cid,
                                'scid' => $request->sub_category[$index],
                                'serial_no' => $serial_no_card,
                                'qty' => 1,
                                'price' => 1,
                                'priceofUnit' => 1,
                                'status' => 1,
                            ]);
                            $amount += 1;

                            $TblStockinsertedIds[] = $newStock->id;
                        } else {
                            $avalabile = 1;
                            try {
                                TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                            } catch (\Exception $e) {
                                return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                            }
                            if ($TblcardinsertedIds) {
                                TblCard::whereIn('id', $TblcardinsertedIds)->delete();
                            }
                            $Record_delete = Report::where('id', $report_id)->first();
                            if ($Record_delete) {
                                $Record_delete->delete();
                            }
                            return redirect()->back()->with('error', 'Same Serial Number Found, Failed to store the report.');
                        }

                    }
                    if ($avalabile == 0) {
                        $tbl_card = new TblCard();
                        $tbl_card->scid = $request->sub_category[$index];
                        $tbl_card->report_id = $report_id;
                        $tbl_card->sr_card = $serial_no_card;
                        $tbl_card->amp_card = $request->amp_card[$index] ?? null;
                        $tbl_card->volt_card = $request->volt_card[$index] ?? null;
                        $tbl_card->watt_card = $request->watt_card[$index] ?? null;
                        $tbl_card->save();

                        $TblcardinsertedIds[] = $tbl_card->id;
                    }
                }
            }
        }

        // sr_led in mate update tbl_stock qty and upadte final amount and insert in tbl_leds if any serial number repeat then delete all insert id and delete report as well and redirct back as well...
        if (!empty($request->srled[0])) {
            $avalabile = 0;
            $TblStockinsertedIds = [];
            $TblLedinsertedIds = [];
            foreach ($request->srled as $index => $serial_no) {
                $existingRecord = TblStock::where('serial_no', $serial_no)
                    ->where('status', 0)
                    ->first();
                if ($existingRecord) {
                    $amount += $existingRecord->priceofUnit;
                    // $invoice_no =$existingRecord->invoice_no;
                    $existingRecord->status = 1;
                    $existingRecord->save();
                } else {
                    $party = tbl_party::where('party_name', 'opening stock')->first();
                    $party_id = $party->id;
                    $invoice = tbl_purchase::where('pid', $party_id)->first();
                    $invoice_no = $invoice->invoice_no;
                    $date = $invoice->date;
                    $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                        ->where('scid', $request->sub_category[$index])
                        ->first();
                    $cid = $invoice_data->cid;

                    $serial_no_count = TblStock::where('invoice_no', $invoice_no)
                        ->where('scid', $request->sub_category[$index])
                        ->where('cid', $cid)
                        ->where('serial_no', $serial_no)
                        ->count();

                    if ($serial_no_count === 0) {
                        $newStock = TblStock::create([
                            'date' => $date,
                            'invoice_no' => $invoice_no,
                            'cid' => $cid,
                            'scid' => $request->sub_category[$index],
                            'serial_no' => $serial_no,
                            'qty' => 1,
                            'price' => 1,
                            'priceofUnit' => 1,
                            'status' => 1,
                        ]);
                        $amount += 1;

                        $TblStockinsertedIds[] = $newStock->id;
                    } else {
                        $avalabile = 1;
                        try {
                            TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                        }
                        if ($TblLedinsertedIds) {
                            TblLed::whereIn('id', $TblLedinsertedIds)->delete();
                        }
                        $Record_delete = Report::where('id', $report_id)->first();
                        if ($Record_delete) {
                            $Record_delete->delete();
                        }

                        return redirect()->back()->with('error', 'Same Serial Number Found, Failed to store the report.');

                    }
                }
                if ($avalabile == 0) {
                    $tbl_led = new TblLed();
                    $tbl_led->scid = $request->sub_category[$index];
                    $tbl_led->report_id = $report_id;
                    $tbl_led->sr_led = $serial_no;
                    $tbl_led->amp_led = $request->ampled[$index] ?? null;
                    $tbl_led->volt_led = $request->voltled[$index] ?? null;
                    $tbl_led->watt_led = $request->wattled[$index] ?? null;
                    $tbl_led->save();

                    $TblLedinsertedIds[] = $tbl_led->id;
                }
            }
        }
        $Record_update_final_amount = Report::where('id', $report_id)->first();
        $Record_update_final_amount->final_amount = $amount;
        $Record_update_final_amount->save();

        if ($report->save()) {
            return redirect()->route('report.index')->with('success', 'Report added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to store the report. Please try again.');
        }
    }

    public function show($id)
    {
        $report = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category')->find($id);
        return view('report.show', compact('report'));
    }
}
