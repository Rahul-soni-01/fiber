<?php

namespace App\Http\Controllers;

use App\Models\tbl_party;
use App\Models\tbl_purchase;
use App\Models\tbl_purchase_item;
use Auth;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\TblLed;
use App\Models\TblCard;
use App\Models\TblStock;
use Illuminate\Support\Facades\Validator;
use App\Models\tbl_sub_category;
use App\Models\tbl_category;
use App\Models\TblCustomer;
use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\TblReportItem;
use Illuminate\Support\Facades\DB;

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
            $reports = Report::with('tbl_leds', 'tbl_cards')->get();
            // dd($reports);
            return view("report.index", compact('reports'));
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $sub_categories = tbl_sub_category::where('cid', 1)->get();
            $all_sub_categories = tbl_sub_category::with('category')
                ->orderBy('cid')
                ->get();
            $categoryId = tbl_category::whereRaw('LOWER(category_name) = ?', ['card'])->value('id');
            $cards = tbl_sub_category::where('cid', $categoryId)->get();

            $party_id = tbl_party::where('party_name', 'opening stock')->value('id');
            // dd($party_id);

            $invoice = tbl_purchase::where('pid', $party_id)->first();

            $invoice_no = $invoice->invoice_no;
            $isolators = TblStock::where('cid', 8)
                ->where('scid', 22)
                ->where('invoice_no', $invoice_no)
                ->where('status', 0)
                ->get();

            $qsswitches = TblStock::where('cid', 9)
                ->where('scid', 15)
                ->where('invoice_no', $invoice_no)
                ->where('status', 0)
                ->get();

            $couplars = TblStock::where('cid', 12)
                ->where('scid', 23)
                ->where('invoice_no', $invoice_no)
                ->where('status', 0)
                ->get();
            $hrs = TblStock::where('cid', 6)
                ->where('scid', 19)
                ->where('invoice_no', $invoice_no)
                ->where('status', 0)
                ->get();
            // dd($hrs);

            $customers = TblCustomer::all();
            // return view("report.create", compact('sub_categories', 'customers', 'cards', 'isolators', 'qsswitches', 'couplars', 'hrs'));
            return view("report.createNew", compact('all_sub_categories', 'customers', 'cards', 'isolators', 'qsswitches', 'couplars', 'hrs'));
        }
        return redirect('/unauthorized');
    }

    public function store(Request $request)
    {
        dd($request->all());

        $validator = Validator::make(
            $request->all(),
            [
                // 'part' => 'required|numeric',
                // 'temp' => 'required|numeric',
                /*'warranty' => 'required|numeric',
                'worker_name' => 'required|string|max:255',
                'sr_no_fiber' => 'required|string|max:255',
                'm_j' => 'required|string|max:255',
                'type' => 'required|numeric',*/
                // 'card' => 'required|array',
                // 'sr_card' => 'required|array',
                // 'sr_cardamp' => 'required|array',
                // 'sr_cardvolt' => 'required|array',
                // 'sr_cardwatt' => 'required|array',
                // 'srled.*' => 'nullable|distinct',
                // 'ampled' => 'required|array',
                // 'voltled' => 'required|array',
                // 'wattled' => 'required|array',
                // 'sr_isolator' => 'required|string|max:255',
                // 'sr_aom_qswitch' => 'required|string|max:255',
                // 'amp_aom_qswitch' => 'required|string|max:255',
                // 'volt_aom_qswitch' => 'required|string|max:255',
                // 'watt_aom_qswitch' => 'required|string|max:255',
                /*'sr_cavity_nani' => 'required|string|max:255',
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
                'final_cavity' => 'required|string|max:255',*/
                // 'note1' => 'nullable|string|max:255',
                // 'note2' => 'nullable|string|max:255',
            ],
            [
                // 'srled.*.distinct' => 'Duplicate serial number found.',
            ]
        );

        if ($validator->fails()) {
            $firstErrorMessage = $validator->errors()->first();
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
        }
        $report = new Report();
        $report->part = $request->input('part');

        if (Auth()->user()->type === 'godown') {
            $report->r_status = 0;
            $report->part = 1;
            $report->status = 0;
        }
        // $report->f_status = $request->input('warranty');
        $report->worker_name = $request->input('worker_name');
        $report->sr_no_fiber = $request->input('sr_no_fiber');
        $report->m_j = $request->input('m_j');
        $report->type = $request->input('type');
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
        $report->temp = $request->input('temp');

        if (Auth()->user()->type === 'electric') {
            // $report->r_status = 0;
            $report->f_status = 0;
        } elseif (Auth()->user()->type === 'admin') {
            $report->r_status = 1;
        }

        try {
            $report->save();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
        }

        $report_id = $report->id;

        $amount = 0;
        $sub_category = $request->input('sub_category');
        if ($sub_category) {
            foreach ($request->srled as $index => $serial_no) {
                $sr_no_or_not = $request->sr_no_or_not[$index];
                $dead = $request->dead[$index];
                if ($sr_no_or_not == 1) {
                    $existingRecord = TblStock::where('serial_no', $serial_no)
                        ->where('status', 0)
                        ->first();
                    if ($existingRecord) {
                        $amount += $existingRecord->priceofUnit;
                        // $invoice_no =$existingRecord->invoice_no;
                        $existingRecord->status = 1;
                        if($dead == 1){
                            $existingRecord->dead_status = 1;
                        }
                        $existingRecord->save();
                    }else{

                    $party = tbl_party::where('party_name', 'opening stock')->first();
                    $party_id = $party->id;
                    $invoice = tbl_purchase::where('pid', $party_id)->first();
                    $invoice_no = $invoice->invoice_no;
                    $date = $invoice->date;
                    $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                        ->where('scid', $request->sub_category[$index])
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
                            'scid' => $request->card[$index],
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
                }elseif($sr_no_or_not == 0){

                }

                $tbl_card = new TblReportItem();
                $tbl_card->scid = $request->card[$index];
                $tbl_card->report_id = $report_id;
                $tbl_card->sr_card = 0;
                $tbl_card->amp_card = $request->sr_cardamp[$index] ?? null;
                $tbl_card->volt_card = $request->sr_cardvolt[$index] ?? null;
                $tbl_card->watt_card = $request->sr_cardwatt[$index] ?? null;
                try {
                    $tbl_card->save();
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
                }
            }
        }

        // srisolator and tblstock status 1
        $isolators = $request->input('srisolator');
        if ($isolators) {
            $TblStockisolators = TblStock::where('id', $isolators)->first();
            if ($TblStockisolators) {
                $amount += $TblStockisolators->priceofUnit;
                $TblStockisolators->status = 1;
                $TblStockisolators->save();
            }
        }

        // qsswitch and tblstock status 1
        $srqsswitch = $request->input('sr_aom_qswitch');
        if ($srqsswitch) {
            $TblStocksrqsswitch = TblStock::where('id', $srqsswitch)->first();
            if ($TblStocksrqsswitch) {
                $amount += $TblStocksrqsswitch->priceofUnit;
                $TblStocksrqsswitch->status = 1;
                $TblStocksrqsswitch->save();
            }
        }

        // hr and tblstock status 1
        $sr_hr = $request->input('sr_hr');
        if ($sr_hr) {
            $TblStocksr_hr = TblStock::where('id', $sr_hr)->first();
            if ($TblStocksr_hr) {
                $amount += $TblStocksr_hr->priceofUnit;
                $TblStocksr_hr->status = 1;
                $TblStocksr_hr->save();
            }
        }

        // fiber in mate update tbl_stoke qty and upadte final amount as well...
        $sr_fiber_nano = $request->input('sr_fiber_nano');
        $sr_fiber_moto = $request->input('sr_fiber_moto');
        if ($sr_fiber_nano || $sr_fiber_moto) {
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
                    $amount += $final_fiber * $TblStock->priceofUnit;
                }
            }
        }

        // sr_card in mate update tbl_stoke qty and upadte final amount and insert in tbl_cards if any serial number repeat then delete all insert id and delete report as well and redirct back as well...

        $avalabile = 0;
        $TblStockinsertedIds = [];
        $TblcardinsertedIds = [];
        if (!empty($request->sr_card)) {
            foreach ($request->sr_card as $index => $serial_no_card) {

                $sub_category_name = tbl_sub_category::where('id', operator: $request->card[$index])
                    ->first();
                $sub_category_id = $sub_category_name->id;
                $category_id = $sub_category_name->cid;

                if ($avalabile == 0) {
                    $tbl_card = new TblCard();
                    $tbl_card->scid = $request->card[$index];
                    $tbl_card->report_id = $report_id;
                    $tbl_card->sr_card = 0;
                    $tbl_card->amp_card = $request->sr_cardamp[$index] ?? null;
                    $tbl_card->volt_card = $request->sr_cardvolt[$index] ?? null;
                    $tbl_card->watt_card = $request->sr_cardwatt[$index] ?? null;
                    try {
                        $tbl_card->save();
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
                    }

                    $TblcardinsertedIds[] = $tbl_card->id;
                }

                $TblStock = TblStock::where('scid', $sub_category_id)
                    ->where('cid', $category_id)
                    ->first();

                if ($TblStock) {
                    $amount += $TblStock->priceofUnit;
                } else {
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
                        ->where('scid', $request->card[$index])
                        ->where('cid', $cid)
                        ->where('serial_no', $serial_no_card)
                        ->count();

                    if ($serial_no_card_count === 0) {
                        $newStock = TblStock::create([
                            'date' => $date,
                            'invoice_no' => $invoice_no,
                            'cid' => $cid,
                            'scid' => $request->card[$index],
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
            }
        }
        // sr_led in mate update tbl_stock qty and upadte final amount and insert in tbl_leds if any serial number repeat then delete all insert id and delete report as well and redirct back as well...

        $avalabile = 0;
        $TblStockinsertedIds = [];
        $TblLedinsertedIds = [];
        if (!empty($request->srled)) {

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
        // dd($report);
        return view('report.show', compact('report'));
    }
    public function search(Request $request)
    {
        if ($request->sr_no) {
            $reports = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category')->where('sr_no_fiber', $request->sr_no)->get();
            return view('report.search', compact('reports'));
        }
        return view('report.search');
    }
    public function edit($id)
    {
        $report = Report::with('tbl_leds', 'tbl_cards', 'tbl_leds.tbl_sub_category')->find($id);
        $cards = tbl_sub_category::where('cid', 7)->get();
        $sub_categories = tbl_sub_category::where('cid', 1)->get();
        $party = tbl_party::where('party_name', 'opening stock')->first();
        $party_id = $party->id;
        $invoice = tbl_purchase::where('pid', $party_id)->first();

        $invoice_no = $invoice->invoice_no;
        $isolators = TblStock::where('cid', 8)
            ->where('scid', 22)
            ->where('invoice_no', $invoice_no)
            ->where('status', 0)
            ->get();

        $qsswitches = TblStock::where('cid', 9)
            ->where('scid', 15)
            ->where('invoice_no', $invoice_no)
            ->where('status', 0)
            ->get();

        $couplars = TblStock::where('cid', 12)
            ->where('scid', 23)
            ->where('invoice_no', $invoice_no)
            ->where('status', 0)
            ->get();
        $hrs = TblStock::where('cid', 6)
            ->where('scid', 19)
            ->where('invoice_no', $invoice_no)
            ->where('status', 0)
            ->get();


        return view('report.edit', compact('sub_categories', 'cards', 'isolators', 'qsswitches', 'couplars', 'hrs', 'report'));
    }
    public function update(Request $request, $id)
    {
        if (Auth()->user()->type === 'cavity') {
            $validator = Validator::make(
                $request->all(),
                [
                    'worker_name' => 'required|string|max:255',
                    // 'sr_cavity_nani' => 'required|string|max:255',
                    // 'sr_cavity_moti' => 'required|string|max:255',
                    // 'sr_combiner_3_1' => 'required|string|max:255',
                    // 'amp_combiner_3_1' => 'required|string|max:255',
                    // 'volt_combiner_3_1' => 'required|string|max:255',
                    // 'watt_combiner_3_1' => 'required|string|max:255',
                    // 'sr_couplar_2_2' => 'required|string|max:255',
                    // 'amp_couplar_2_2' => 'required|string|max:255',
                    // 'volt_couplar_2_2' => 'required|string|max:255',
                    // 'watt_couplar_2_2' => 'required|string|max:255',
                    // 'sr_hr' => 'required|string|max:255',
                    // 'note1' => 'nullable|string|max:255',
                    // 'note2' => 'nullable|string|max:255',
                ]
            );

            if ($validator->fails()) {
                $firstErrorMessage = $validator->errors()->first();
                return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
            }

            $report = Report::find($id);
            $report->worker_name = $request->worker_name;
            $report->sr_cavity_nani = $request->sr_cavity_nani;
            $report->sr_cavity_moti = $request->sr_cavity_moti;
            $report->sr_combiner_3_1 = $request->sr_combiner_3_1;
            $report->amp_combiner_3_1 = $request->amp_combiner_3_1;
            $report->volt_combiner_3_1 = $request->volt_combiner_3_1;
            $report->watt_combiner_3_1 = $request->watt_combiner_3_1;
            $report->sr_couplar_2_2 = $request->sr_couplar_2_2;
            $report->amp_couplar_2_2 = $request->amp_couplar_2_2;
            $report->volt_couplar_2_2 = $request->volt_couplar_2_2;
            $report->watt_couplar_2_2 = $request->watt_couplar_2_2;
            $report->sr_hr = $request->sr_hr;
            $report->note1 = $request->note1;
            $report->note2 = $request->note2;
            // $report->status = null;
            $report->save();
            $report_id = $id;
            $amount = 0;

            $sr_hr = $request->input('sr_hr');
            if ($sr_hr) {
                $TblStocksr_hr = TblStock::where('serial_no', $sr_hr)->first();
                if ($TblStocksr_hr) {
                    $amount += $TblStocksr_hr->priceofUnit;
                    $TblStocksr_hr->status = 1;
                    $TblStocksr_hr->save();
                }
            }
            if ($report->save()) {
                return redirect()->route('report.index')->with('success', 'Report added successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to Update the report. Please try again.');
            }
        } elseif (Auth()->user()->type === 'user') {
            $validator = Validator::make(
                $request->all(),
                [
                    'sr_no_fiber' => 'required|string|max:255',
                    // 'm_j' => 'required|string|max:255',
                    'type' => 'required|integer',
                    // 'sr_isolator' => 'required|string|max:255',
                    // 'sr_fiber_nano' => 'required|numeric|min:0',
                    // 'sr_fiber_moto' => 'required|numeric|min:0',
                    // 'output_amp' => 'required|string|max:255',
                    // 'output_volt' => 'required|string|max:255',
                    // 'nani_cavity' => 'required|string|max:255',
                    // 'final_cavity' => 'required|string|max:255',
                    // 'note1' => 'nullable|string|max:255',
                    // 'note2' => 'nullable|string|max:255',
                ]
            );

            if ($validator->fails()) {
                $firstErrorMessage = $validator->errors()->first();
                return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
            }
            $report = Report::find($id);
            $report->sr_no_fiber = $request->sr_no_fiber;
            $report->m_j = $request->m_j;
            $report->type = $request->type;
            $report->sr_isolator = $request->sr_isolator;
            $report->sr_fiber_nano = $request->sr_fiber_nano;
            $report->sr_fiber_moto = $request->sr_fiber_moto;
            $report->output_amp = $request->output_amp;
            $report->output_volt = $request->output_volt;
            $report->output_watt = $request->output_watt;
            $report->nani_cavity = $request->nani_cavity;
            $report->final_cavity = $request->final_cavity;
            $report->note1 = $request->note1;
            $report->note2 = $request->note2;
            $report->remark = $request->remark;
            $report->temp = 0;
            $report->status = 0;
            $report->sale_status = 0;
            if ($request->part == 1) {
                $report->r_status = 0;
            }
            $report->save();

            $report_id = $id;

            $amount = 0;

            // srisolator and tblstock status 1

            $isolators = $request->input('srisolator');
            if ($isolators) {
                $TblStockisolators = TblStock::where('id', $isolators)->first();
                if ($TblStockisolators) {
                    $amount += $TblStockisolators->priceofUnit;
                    $TblStockisolators->status = 1;
                    $TblStockisolators->save();
                }
            }

            // qsswitch and tblstock status 1
            $srqsswitch = $request->input('sr_aom_qswitch');
            if ($srqsswitch) {
                $TblStocksrqsswitch = TblStock::where('id', $srqsswitch)->first();
                if ($TblStocksrqsswitch) {
                    $amount += $TblStocksrqsswitch->priceofUnit;
                    $TblStocksrqsswitch->status = 1;
                    $TblStocksrqsswitch->save();
                }
            }

            // hr and tblstock status 1
            $sr_hr = $request->input('sr_hr');
            if ($sr_hr) {
                $TblStocksr_hr = TblStock::where('id', $sr_hr)->first();
                if ($TblStocksr_hr) {
                    $amount += $TblStocksr_hr->priceofUnit;
                    $TblStocksr_hr->status = 1;
                    $TblStocksr_hr->save();
                }
            }

            // fiber in mate update tbl_stoke qty and upadte final amount as well...
            $sr_fiber_nano = $request->input('sr_fiber_nano');
            $sr_fiber_moto = $request->input('sr_fiber_moto');
            if ($sr_fiber_nano || $sr_fiber_moto) {
                $final_fiber = $sr_fiber_moto + $sr_fiber_nano;
                if ($final_fiber) {
                    $sub_category_name = tbl_sub_category::where('sub_category_name', 'Fiber')
                        ->first();

                    $sub_category_id = $sub_category_name->id;
                    $category_id = $sub_category_name->cid;

                    $TblStock = TblStock::where('scid', $sub_category_id)
                        ->where('cid', $category_id)
                        ->where('qty', '!=', value: 0)
                        ->first();

                    if ($TblStock) {
                        $amount += $final_fiber * $TblStock->priceofUnit;
                    }
                }
            }

            // sr_card in mate update tbl_stoke qty and upadte final amount and insert in tbl_cards if any serial number repeat then delete all insert id and delete report as well and redirct back as well...

            $avalabile = 0;
            $TblStockinsertedIds = [];
            $TblcardinsertedIds = [];
            if (!empty($request->sr_card)) {
                $delete_stock = TblCard::where('report_id', $report_id)->delete();
                foreach ($request->sr_card as $index => $serial_no_card) {
                    //delete tblstock data where report id same as report id of current request

                    $sub_category_name = tbl_sub_category::where('id', $request->card[$index])
                        ->first();
                    $sub_category_id = $sub_category_name->id;
                    $category_id = $sub_category_name->cid;

                    if ($avalabile == 0) {
                        $tbl_card = new TblCard();
                        $tbl_card->scid = $request->card[$index];
                        $tbl_card->report_id = $report_id;
                        $tbl_card->sr_card = 0;
                        $tbl_card->amp_card = $request->sr_cardamp[$index] ?? null;
                        $tbl_card->volt_card = $request->sr_cardvolt[$index] ?? null;
                        $tbl_card->watt_card = $request->sr_cardwatt[$index] ?? null;
                        try {
                            $tbl_card->save();
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
                        }

                        $TblcardinsertedIds[] = $tbl_card->id;
                    }

                    $TblStock = TblStock::where('scid', $sub_category_id)
                        ->where('cid', $category_id)
                        ->first();

                    if ($TblStock) {
                        $amount += $TblStock->priceofUnit;
                    } else {
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
                            ->where('scid', $request->card[$index])
                            ->where('cid', $cid)
                            ->where('serial_no', $serial_no_card)
                            ->count();

                        if ($serial_no_card_count === 0) {
                            $newStock = TblStock::create([
                                'date' => $date,
                                'invoice_no' => $invoice_no,
                                'cid' => $cid,
                                'scid' => $request->card[$index],
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
                }
            }
            // sr_led in mate update tbl_stock qty and upadte final amount and insert in tbl_leds if any serial number repeat then delete all insert id and delete report as well and redirct back as well...

            $avalabile = 0;
            $TblStockinsertedIds = [];
            $TblLedinsertedIds = [];
            if (!empty($request->srled)) {
                $delete_stock = TblLed::where('report_id', $report_id)->delete();
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
                return redirect()->route('report.index')->with('success', 'Report updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to Update the report. Please try again.');
            }
        } elseif (Auth()->user()->type === 'account') {
            $status = $request->status;
            $report = Report::find($id);
            $report->status = $status;
            $report->sale_status = 0;
            $report->remark = $request->remark;
            $report->save();

            if ($report->save()) {
                return redirect()->route('report.index')->with('success', 'Report updated successfully.');
            } else {
                return redirect()->back()->with('error', 'Failed to Update the report. Please try again.');
            }
        } elseif (Auth()->user()->type === 'electric') {
            $validator = Validator::make(
                $request->all(),
                [
                    // 'worker_name' => 'required|string|max:255',
                ]
            );

            if ($validator->fails()) {
                $firstErrorMessage = $validator->errors()->first();
                return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
            }
            $report = Report::find($id);
            $report->sr_aom_qswitch = $request->input('sr_aom_qswitch');
            $report->amp_aom_qswitch = $request->input('amp_aom_qswitch');
            $report->volt_aom_qswitch = $request->input('volt_aom_qswitch');
            $report->watt_aom_qswitch = $request->input('watt_aom_qswitch');
            $report->save();
            $amount = 0;

            $srqsswitch = $request->input('sr_aom_qswitch');
            if ($srqsswitch) {
                $TblStocksrqsswitch = TblStock::where('id', $srqsswitch)->first();

                if ($TblStocksrqsswitch) {
                    $amount += $TblStocksrqsswitch->priceofUnit;
                    $TblStocksrqsswitch->status = 1;
                    $TblStocksrqsswitch->save();
                    // dd($TblStocksrqsswitch);
                }
            }
            $avalabile = 0;
            $TblStockinsertedIds = [];
            $TblcardinsertedIds = [];
            if (!empty($request->sr_card)) {
                $report_id = $id;
                foreach ($request->sr_card as $index => $serial_no_card) {

                    $sub_category_name = tbl_sub_category::where('id', $request->card[$index])
                        ->first();
                    $sub_category_id = $sub_category_name->id;
                    $category_id = $sub_category_name->cid;

                    if ($avalabile == 0) {
                        $tbl_card = new TblCard();
                        $tbl_card->scid = $request->card[$index];
                        $tbl_card->report_id = $report_id;
                        $tbl_card->sr_card = 0;
                        $tbl_card->amp_card = $request->sr_cardamp[$index] ?? null;
                        $tbl_card->volt_card = $request->sr_cardvolt[$index] ?? null;
                        $tbl_card->watt_card = $request->sr_cardwatt[$index] ?? null;
                        try {
                            $tbl_card->save();
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
                        }

                        $TblcardinsertedIds[] = $tbl_card->id;
                    }

                    $TblStock = TblStock::where('scid', $sub_category_id)
                        ->where('cid', $category_id)
                        ->first();

                    if ($TblStock) {
                        $amount += $TblStock->priceofUnit;
                    } else {
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
                            ->where('scid', $request->card[$index])
                            ->where('cid', $cid)
                            ->where('serial_no', $serial_no_card)
                            ->count();

                        if ($serial_no_card_count === 0) {
                            $newStock = TblStock::create([
                                'date' => $date,
                                'invoice_no' => $invoice_no,
                                'cid' => $cid,
                                'scid' => $request->card[$index],
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
                }
            }

            $avalabile = 0;
            $TblStockinsertedIds = [];
            $TblLedinsertedIds = [];
            if (!empty($request->srled)) {

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
                return redirect()->back()->with('error', 'Failed to Update the report. Please try again.');
            }
        }

    }
    public function reject(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $reports = Report::with('tbl_leds', 'tbl_cards')->where('status', 2)->get();
            return view("report.reject", compact('reports'));
        }
        return redirect('/unauthorized');
    }

    public function layout()
    {
        $categories = tbl_category::all();
        $subcategories = tbl_sub_category::all();
        return view('report.layout', compact('categories', 'subcategories'));
    }
    public function layout_store(Request $request)
    {
        dd($request->all());
    }
    public function stock()
    {
        $categories = tbl_category::all();
        $subcategories = tbl_sub_category::all();
        $stockResults = TblStock::select(
            'scid',
            DB::raw('SUM(qty) as total_qty'),
            DB::raw('SUM(CASE WHEN status = 0 THEN qty ELSE 0 END) as qty_status_0'),
            DB::raw('SUM(CASE WHEN status = 1 THEN qty ELSE 0 END) as qty_status_1')
        )
            ->with('subCategory')
            ->groupBy('scid')
            ->get();

        $purchaseResults = tbl_purchase_item::select('scid', DB::raw('SUM(qty) as total_purchase_qty'))
            ->with('subCategory')
            ->groupBy('scid')
            ->get();

        $sr_combiner_3_1 = Report::select(DB::raw('SUM(sr_combiner_3_1) as total_report'))->first();

        $usedCards = TblCard::select('scid', DB::raw('COUNT(*) as count'))
            ->groupBy('scid')
            ->get();

        $fiberData = Report::select(
            DB::raw('SUM(sr_fiber_nano) as total_nano'),
            DB::raw('SUM(sr_fiber_moto) as total_moto')
        )->first();
        $fiber = $fiberData->total_nano + $fiberData->total_moto;

        $sr_cavity = Report::select(
            DB::raw('SUM(sr_cavity_nani) as total_cav_nano'),
            DB::raw('SUM(sr_cavity_moti) as total_cav_moto')
        )->first();
        $sr_cavity_total = $sr_cavity->total_cav_nano + $sr_cavity->total_cav_moto;

        $usedsr_hr = Report::select(DB::raw('SUM(sr_hr) as total_report_sr_hr'))->first();
        // $counter = 0;
        foreach ($purchaseResults as $purchaseResult) {
            foreach ($stockResults as $stockResult) {
                // $counter++;

                // if(empty($purchaseResult->subCategory->sub_category_name)){
                //     dd($purchaseResult);
                // }

                if ($purchaseResult->subCategory->sub_category_name == 'Fiber' && $stockResult->subCategory->sub_category_name == 'Fiber') {
                    $stockResult['qty_status_1'] = $fiber;
                    $stockResult['qty_status_0'] = $stockResult['total_qty'] - $fiber;
                }

                if ($purchaseResult->subCategory->sub_category_name == '3*1' && $stockResult->subCategory->sub_category_name == '3*1') {
                    $stockResult['qty_status_1'] = $sr_combiner_3_1->total_report;
                    $stockResult['qty_status_0'] = $stockResult['total_qty'] - $sr_combiner_3_1->total_report;
                }

                if ($purchaseResult->subCategory->sub_category_name == 'HR' && $stockResult->subCategory->sub_category_name == 'HR') {
                    $stockResult['qty_status_1'] = $usedsr_hr->total_report_sr_hr;
                    $stockResult['qty_status_0'] = $stockResult['total_qty'] - $usedsr_hr->total_report_sr_hr;
                }

                if ($purchaseResult->subCategory->sub_category_name == 'Power PCB' && $stockResult->subCategory->sub_category_name == 'Power PCB') {
                    foreach ($usedCards as $usedCard) {
                        if ($usedCard->scid == $stockResult->scid) {
                            $stockResult['qty_status_1'] = $usedCard->count;
                            $stockResult['qty_status_0'] = $stockResult['total_qty'] - $usedCard->count;
                        }
                    }
                }

                if ($purchaseResult->subCategory->sub_category_name == 'Control card' && $stockResult->subCategory->sub_category_name == 'Control card') {
                    $stockResult['qty_status_1'] = $sr_combiner_3_1->total_report;
                    $stockResult['qty_status_0'] = $stockResult['total_qty'] - $sr_combiner_3_1->total_report;
                }

            }

        }

        return view('report.stock', compact('categories', 'subcategories', 'stockResults', 'purchaseResults'));
    }
}
