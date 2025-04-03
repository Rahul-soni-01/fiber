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
use App\Models\Replacement;
use App\Models\Sale;
use App\Models\SelectedInvoice;
use App\Models\TblReportItem;
use App\Models\TblSaleReturn;
use App\Models\Tbltype;
use Carbon\Carbon;
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
            $reports = Report::with('tbl_leds', 'tbl_cards', 'tbl_type')->get();
            // dd($reports);
            if (auth()->user()->type === 'godown') {
                // dd("de");
                return view("report.godownindex", compact('reports'));
            }
            return view("report.index", compact('reports'));
        }
        return redirect('/unauthorized');
    }
    public function indexNew(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $types = Tbltype::with('reports')->get(); // Use 'tbl_type' (singular) as defined in the model
            // $reports = Report::with('tbl_type')->get()->groupBy('type');
            // dd($types,$reports);
            if (auth()->user()->type === 'godown') {
                // dd("de");
                $reports = Report::with('tbl_leds', 'tbl_cards', 'tbl_type')
                    ->where('sale_status', '0')
                    ->orWhere('part', 1)
                    ->get();
                return view("report.godownindex", compact('reports'));
            }
            return view("report.indexNew", compact('types'));
        }
        return redirect('/unauthorized');
    }
    public function ReportNew(Request $request)
    {
        $reports = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category', 'tbl_type')
        // ->where('part', 0);
        ->where('sale_status', 0);
        // Apply filters conditionally
        if ($request->query('s_date') !== null && $request->query('e_date') !== null) {
            $startDate = Carbon::parse($request->query('s_date'))->startOfDay();
            $endDate = Carbon::parse($request->query('e_date'))->endOfDay();
            $reports->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($request->query('sr_no') !== null) {
            $reports->where('sr_no_fiber', $request->query('sr_no'));
        }
        if ($request->query('worker_name') !== null) {
            $reports->where('worker_name', 'like', '%' . $request->query('worker_name') . '%');
        }
        $reports = $reports->get();
        $tbl_parties = tbl_party::all();
        return view("report.index", compact('reports', 'tbl_parties'));
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            // $sub_categories = tbl_sub_category::where('cid', 1)->get();
            $all_sub_categories = tbl_sub_category::with('category')
                ->orderBy('cid')
                ->get();
            // $categoryId = tbl_category::whereRaw('LOWER(category_name) = ?', ['card'])->value('id');
            // $cards = tbl_sub_category::where('cid', $categoryId)->get();
            $types = Tbltype::orderBy('id', 'asc')->get();
            // $party_id = tbl_party::where('party_name', 'opening stock')->value('id');
            // $invoice = tbl_purchase::where('pid', $party_id)->first();
            // $invoice_no = $invoice->invoice_no;
            // $isolators = TblStock::where('cid', 8)
            //     ->where('scid', 22)
            //     ->where('invoice_no', $invoice_no)
            //     ->where('status', 0)
            //     ->get();
            // $qsswitches = TblStock::where('cid', 9)
            //     ->where('scid', 15)
            //     ->where('invoice_no', $invoice_no)
            //     ->where('status', 0)
            //     ->get();
            // $couplars = TblStock::where('cid', 12)
            //     ->where('scid', 23)
            //     ->where('invoice_no', $invoice_no)
            //     ->where('status', 0)
            //     ->get();
            // $hrs = TblStock::where('cid', 6)
            //     ->where('scid', 19)
            //     ->where('invoice_no', $invoice_no)
            //     ->where('status', 0)
            //     ->get();
            // dd($hrs);
            $customers = TblCustomer::all();
            // return view("report.createNew", compact('types', 'all_sub_categories', 'customers', 'cards', 'isolators', 'qsswitches', 'couplars', 'hrs'));
            return view("report.createNew", compact('types', 'all_sub_categories', 'customers'));
        }
        return redirect('/unauthorized');
    }
    public function store(Request $request)
    {
        // dd($request->all());
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
        // srisolator and tblstock status 1
        /*$isolators = $request->input('srisolator');
        if ($isolators) {
            $TblStockisolators = TblStock::where('id', $isolators)->first();
            if ($TblStockisolators) {
                $amount += $TblStockisolators->priceofUnit;
                $TblStockisolators->status = 1;
                $TblStockisolators->save();
            }
        }*/
        // qsswitch and tblstock status 1
        /*$srqsswitch = $request->input('sr_aom_qswitch');
        if ($srqsswitch) {
            $TblStocksrqsswitch = TblStock::where('id', $srqsswitch)->first();
            if ($TblStocksrqsswitch) {
                $amount += $TblStocksrqsswitch->priceofUnit;
                $TblStocksrqsswitch->status = 1;
                $TblStocksrqsswitch->save();
            }
        }*/
        // hr and tblstock status 1
        /*$sr_hr = $request->input('sr_hr');
        if ($sr_hr) {
            $TblStocksr_hr = TblStock::where('id', $sr_hr)->first();
            if ($TblStocksr_hr) {
                $amount += $TblStocksr_hr->priceofUnit;
                $TblStocksr_hr->status = 1;
                $TblStocksr_hr->save();
            }
        }*/
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
        /*$avalabile = 0;
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
        }*/
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
    public function show(Request $request, $id)
    {
        $report = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category', 'tbl_type')->find($id);
        $reportitems = TblReportItem::with('report', 'tbl_stocks', 'tbl_sub_category.category', 'tbl_sub_category')->where('report_id', $id)->get();
        // dd($reportitems);
        // return view('report.show', compact('report'));
        return view('report.Newshow', compact('report', 'reportitems'));
    }
    public function typeshow(Request $request, $id)
    {
        $reports = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category', 'tbl_type')
            ->where('type', $id);
        // Apply filters conditionally
        if ($request->query('s_date') !== null && $request->query('e_date') !== null) {
            $startDate = Carbon::parse($request->query('s_date'))->startOfDay();
            $endDate = Carbon::parse($request->query('e_date'))->endOfDay();
            $reports->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($request->query('sr_no') !== null) {
            $reports->where('sr_no_fiber', $request->query('sr_no'));
        }
        if ($request->query('worker_name') !== null) {
            $reports->where('worker_name', 'like', '%' . $request->query('worker_name') . '%');
        }
        $reports = $reports->get();
        // dd($reports);
        $tbl_parties = tbl_party::all();
        // $reportitems = TblReportItem::with('report', 'tbl_stocks', 'tbl_sub_category.category', 'tbl_sub_category')
        // ->where('report_id', $id)->get();
        // return view('report.show', compact('report'));
        return view('report.index', compact('reports', 'tbl_parties'));
    }
    public function get_sc_sr_no(Request $request)
    {
        $type = $request->type;
        if ($request->url == 'sale-repair-create') {
            $reports = Report::with('tbl_leds.tbl_sub_category', 'tbl_type')
                ->where('part', 1)
                ->where('sale_status', 0)
                ->where('stock_status', 1)
                ->whereHas('tbl_type', function ($query) use ($type) {
                    $query->where('name', $type);
                })
                ->get()
                ->pluck('sr_no_fiber');
        } elseif ($request->url == 'sale-create') {
            $reports = Report::with('tbl_leds.tbl_sub_category', 'tbl_type')
                ->where('part', 0)
                ->where('sale_status', 0)
                ->where('stock_status', 1)
                ->whereHas('tbl_type', function ($query) use ($type) {
                    $query->where('name', $type);
                })
                ->get()
                ->pluck('sr_no_fiber');
        }

        // dd($reports);
        return response()->json($reports, 200);
        // dd(count($reports),$reports);
    }
    public function search(Request $request)
    {
        if ($request->sr_no) {
            // $reports = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category', 'tbl_type')->where('sr_no_fiber', $request->sr_no)->get();
            // $reportIds = $reports->pluck('id');
            // $reportitems = TblReportItem::with('report', 'tbl_stocks', 'tbl_sub_category.category', 'tbl_sub_category')
            //     ->whereIn('report_id', $reportIds)
            //     ->get();
            $sr_no = $request->input('sr_no');

            $results = collect();
            
            // Helper function to format dates consistently
            $formatDate = function ($item) {
                if (isset($item->date) && $item->date instanceof \DateTime) {
                    $item->formatted_date = $item->date->format('d-M-Y');
                } else {
                    $item->formatted_date = 'N/A';
                }
                return $item;
            };
            
            // tbl_reports
            $reports = Report::where('sr_no_fiber', $sr_no)
                ->select('*', 'sr_no_fiber as sr_no', 'created_at as date', DB::raw("'tbl_reports' as table_name"))
                ->get()
                ->map($formatDate);
            $results = $results->merge($reports);
            
            // tbl_stock
            $stock = TblStock::where('serial_no', $sr_no)
                ->with('category', 'subCategory')
                ->select('*', 'serial_no as sr_no', 'created_at as date', DB::raw("'tbl_stock' as table_name"))
                ->get()
                ->map(function ($item) use ($formatDate) {
                    $item->category_name = $item->category->category_name ?? 'N/A';
                    $item->sub_category_name = $item->subCategory->sub_category_name ?? 'N/A';
                    return $formatDate($item);
                });
            $results = $results->merge($stock);
            
            // tbl_report_items
            $report_items = TblReportItem::where('sr_no', $sr_no)
                ->with('report')
                ->select('*', DB::raw('created_at as date'), DB::raw("'tbl_report_items' as table_name"))
                ->get()
                ->map($formatDate);
            $results = $results->merge($report_items);
            
            // tbl_sales_items
            $salesItems = SaleItem::where('sr_no', $sr_no)
                ->with('sale', 'sale.customer')
                ->get()
                ->map(function ($item) use ($formatDate) {
                    $item->customer_name = $item->sale->customer->customer_name ?? 'N/A';
                    $item->status = $item->sale->status ?? 'N/A';
                    $item->invoice_no = $item->sale->id ?? 'N/A';
                    $item->date = $item->sale->created_at ?? 'N/A';
                    $item->table_name = 'tbl_sales_items';
                    return $formatDate($item);
                });
            $results = $results->merge($salesItems);
            
            // tbl_sale_returns
            $saleReturns = TblSaleReturn::where('sr_no', $sr_no)
                ->with('customer')
                ->select('id', 'sale_id', 'sr_no', 'created_at as date', DB::raw("'tbl_sale_returns' as table_name"))
                ->get()
                ->map($formatDate);
            $results = $results->merge($saleReturns);

            $replacements = Replacement::where('old_sr_no', $sr_no)
                    ->orWhere('new_sr_no', $sr_no)
                    ->get()
                    ->map(function ($item) use ($formatDate) {
                        $item->table_name = 'replacements';
                        $item->action = $item->old_sr_no == $item->sr_no ? 'Replaced' : 'Replacement Received';
                        return $formatDate($item);
                    });
            $results = $results->merge($replacements);
            
            // Sort results by date (ascending order)
            $sortedResults = $results->sortBy(function ($item) {
                return $item->date ?? now(); // Use current time if date is null
            })->values();
            
            // If you need descending order (newest first), use sortByDesc instead:
            // $sortedResults = $results->sortByDesc(function ($item) {
            //     return $item->date ?? now();
            // })->values();
            
          
            // return view('report.search', compact('reports', 'reportitems'));
            return view('report.search', compact('sortedResults'));
        }
        return view('report.search');
    }
    public function ready(Request $request)
    {
        $reports = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category', 'tbl_type')
            // ->where('part', 0)
            ->where('sale_status', 0)
            ->where('r_status', 0)
            ->where('status', 1);
        if ($request->id) {
            $report = Report::find($request->id);
            if ($report) {
                // Update the stock_status field
                $report->stock_status = $report->stock_status == 1 ? 0 : 1;
                $report->save();
                return response()->json([
                    'status' => 200,
                    'message' => 'Stock status updated successfully.',
                    'report' => $report,
                ]);
            }
            return response(["status" => 200, "report" => $report]);
        }
        // Apply filters conditionally
        if ($request->query('s_date') !== null && $request->query('e_date') !== null) {
            $startDate = Carbon::parse($request->query('s_date'))->startOfDay();
            $endDate = Carbon::parse($request->query('e_date'))->endOfDay();
            $reports->whereBetween('created_at', [$startDate, $endDate]);
        }
        if ($request->query('sr_no') !== null) {
            $reports->where('sr_no_fiber', $request->query('sr_no'));
        }
        if ($request->query('worker_name') !== null) {
            $reports->where('worker_name', 'like', '%' . $request->query('worker_name') . '%');
        }
        $reports = $reports->get();
        $ready = 1;
        $tbl_parties = tbl_party::all();
        // dd($reports,"Ctrl");
        return view("report.index", compact('reports', 'tbl_parties', 'ready'));
    }

    public function mainstore(Request $request)
    {
        $reports = Report::with('tbl_type')
                ->where('section', 0)
                ->where('part', 0)
                ->get()
                ->groupBy('sr_no_fiber');
        return view('sections.mainstore', compact('reports'));
    }

    public function manufactur(Request $request)
    {
        $reports = Report::with('tbl_type')
                ->where('section', 1)
                ->where('part', 0)
                ->get()
                ->groupBy('sr_no_fiber');
        return view('sections.manufactur', compact('reports'));
    }

    public function repair(Request $request)
    {
        $reports = Report::with('tbl_type')->where('section', 2)
        // ->where('sr_no_fiber', '!=', 0)
        ->where('part', 0)
        ->get()
        ->groupBy('sr_no_fiber'); // Ensures unique sr_no_fiber values

        // dd($reports);

        return view('sections.repair', compact('reports'));
    }

    public function baddesk(Request $request)
    {
        $reports = Report::with('tbl_type')
                ->where('section', 3)
                ->where('part', 0)
                ->get()
                ->groupBy('sr_no_fiber');
        return view('sections.baddesk',compact('reports'));
    }

    public function sell(Request $request)
    {
        $reports = Report::with('tbl_type')
        ->where('section', 4)
        ->where('part', 0)
        ->get()
        ->groupBy('sr_no_fiber');
        return view('sections.sell',compact('reports'));
    }

    public function edit($id)
    {
        $report = Report::with('tbl_leds', 'tbl_cards', 'tbl_leds.tbl_sub_category', 'tbl_type')->find($id);
        $reportitems = TblReportItem::with('report', 'tbl_stocks', 'tbl_sub_category', 'tbl_sub_category.category')->where('report_id', $id)->get();
        // dd($id);
        $invoice_no = SelectedInvoice::first()->invoice_no;
        $invoice = tbl_purchase::where('invoice_no', $invoice_no)->first();
        $all_sub_categories = tbl_sub_category::with('category')
            ->orderBy('cid')
            ->get();
        // $cards = tbl_sub_category::where('cid', 7)->get();
        // $sub_categories = tbl_sub_category::where('cid', 1)->get();
        // $isolators = TblStock::where('cid', 8)
        //     ->where('scid', 22)
        //     ->where('invoice_no', $invoice_no)
        //     ->where('status', 0)
        //     ->get();
        // $qsswitches = TblStock::where('cid', 9)
        //     ->where('scid', 15)
        //     ->where('invoice_no', $invoice_no)
        //     ->where('status', 0)
        //     ->get();
        // $couplars = TblStock::where('cid', 12)
        //     ->where('scid', 23)
        //     ->where('invoice_no', $invoice_no)
        //     ->where('status', 0)
        //     ->get();
        // $hrs = TblStock::where('cid', 6)
        //     ->where('scid', 19)
        //     ->where('invoice_no', $invoice_no)
        //     ->where('status', 0)
        //     ->get();
        $types = Tbltype::orderBy('id', 'asc')->get();
        // dd($types);
        // return view('report.edit', compact('sub_categories', 'cards', 'isolators', 'qsswitches', 'couplars', 'hrs', 'report'));
        return view('report.Newedit', compact('report', 'reportitems', 'all_sub_categories', 'types'));
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
    public function stock(Request $request)
    {
        $scid = $request->query('scid');
        if ($scid) {
            $subcategory = tbl_sub_category::findOrFail($scid);
            $purchaseResults = tbl_purchase_item::where('scid', $scid)
                ->selectRaw('
                invoice_no,
                scid,
                cid,
                COALESCE(SUM(qty), 0) as total_purchase_qty,
                COALESCE(SUM(total), 0) as total_purchase
            ')->with('category', 'subCategory')
                ->groupBy('invoice_no', 'scid', 'cid')
                ->get();
            // dd($purchaseResults);
            $stockResults = TblStock::where('scid', $scid)->select(
                'scid',
                DB::raw('SUM(qty) as total_qty'),
                DB::raw('SUM(CASE WHEN status = 0 THEN qty ELSE 0 END) as qty_status_0'),
                DB::raw('SUM(CASE WHEN status = 1 THEN qty ELSE 0 END) as qty_status_1')
            )->with('category', 'subCategory')->groupBy('scid')->get()->keyBy('scid');

            $reportResults = TblReportItem::where('scid', $scid)
                ->select(
                    'scid',
                    DB::raw('COUNT(*) as total_count'),
                    DB::raw('SUM(used_qty) as total_used_stock'),
                    DB::raw('SUM(CASE WHEN dead_status = 1 THEN used_qty ELSE 0 END) as dead_status_used_qty'),
                    DB::raw('GROUP_CONCAT(DISTINCT report_id) as report_ids')
                )
                ->with(['tbl_sub_category', 'report']) // Load the report relationship
                ->groupBy('scid')
                ->get()
                ->map(function ($item) {
                    // Fetch all related report data
                    $reportIds = explode(',', $item->report_ids);
                    $reports = Report::whereIn('id', $reportIds)->get();

                    // Replace report_ids with all fields from the related reports
                    $item->report_ids = $reports->map(function ($report) {
                        return [
                            'id' => $report->id,
                            'sr_no_fiber' => $report->sr_no_fiber ?? $report->temp, // Replace null with "temp"
                        ]; // Return the entire report object
                    });

                    return $item;
                });
            // dd($reportResults);
            return view('report.scwisestock', compact('subcategory', 'purchaseResults', 'stockResults', 'reportResults'));
        }
        $categories = tbl_category::all();
        $subcategories = tbl_sub_category::with('category')->get();
        $purchaseResults = tbl_purchase_item::select('scid', DB::raw('SUM(qty) as total_purchase_qty'), DB::raw('SUM(total) as total_purchase'))
            ->groupBy('scid')
            ->get()
            ->keyBy('scid');
        $totalPurchase = tbl_purchase_item::sum('total');
        $stockResults = TblStock::select(
            'scid',
            DB::raw('SUM(qty) as total_qty'),
            DB::raw('SUM(CASE WHEN status = 0 THEN qty ELSE 0 END) as qty_status_0'),
            DB::raw('SUM(CASE WHEN status = 1 THEN qty ELSE 0 END) as qty_status_1')
        )
            ->groupBy('scid')
            ->get()
            ->keyBy('scid');

        $reportResults = TblReportItem::select(
            'scid',
            DB::raw('COUNT(*) as total_count'),
            DB::raw('SUM(dead_status) as total_dead_stock'),
            DB::raw('SUM(used_qty) as total_used_stock'),
            DB::raw('SUM(CASE WHEN dead_status = 1 THEN used_qty ELSE 0 END) as dead_status_used_qty')
        )
            ->groupBy('scid')
            ->get()
            ->keyBy('scid');
        $subcategoryData = $subcategories->map(function ($subcategory) use ($purchaseResults, $stockResults, $reportResults) {
            $scid = $subcategory->id;
            return [
                'subcategory' => $subcategory,
                'total_purchase_qty' => $purchaseResults->get($scid)->total_purchase_qty ?? 0,
                'total_stock_qty' => $stockResults->get($scid)->total_qty ?? 0,
                'qty_status_0' => $stockResults->get($scid)->qty_status_0 ?? 0,
                'qty_status_1' => $stockResults->get($scid)->qty_status_1 ?? 0,
                'total_count' => $reportResults->get($scid)->total_count ?? 0,
                'total_used_stock' => $reportResults->get($scid)->total_used_stock ?? 0,
                'total_dead_stock' => $reportResults->get($scid)->total_dead_stock ?? 0,
                'dead_status_used_qty' => $reportResults->get($scid)->dead_status_used_qty ?? 0,
                'total_purchase' => $purchaseResults->get($scid)->total_purchase ?? 0,
            ];
        });
        // Group subcategoryData by cid
        $groupedSubcategoryData = $subcategoryData->groupBy(function ($item) {
            return $item['subcategory']['category']->main_category;
        });
        $groupedSubcategoryData1 = $subcategoryData->groupBy(function ($item) {
            return $item['subcategory']->cid;
        });
        // Now $groupedSubcategoryData contains subcategories grouped by cid
        // dd($groupedSubcategoryData, $subcategoryData, $reportResults);
        return view('report.stock', compact('groupedSubcategoryData', 'subcategoryData', 'categories', 'subcategories', 'totalPurchase'));
    }
    public function stockReport(Request $request)
    {
        // dd($request->all());
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
        $report->f_status = $request->input('warranty') !== null ? $request->input('warranty') : 1;
        $report->worker_name = $request->input('worker_name');
        $report->sr_no_fiber = $request->input('sr_no_fiber');
        $report->m_j = $request->input('m_j');
        $report->type = $request->input('type');
        $report->note1 = $request->input('note1');
        $report->note2 = $request->input('note2');
        $report->type = $request->input('type');
        $report->sale_status = 0;
        if($request->input('part') == 1){
            $report->section = 2;
            $report->r_status = 1;
        }elseif($request->input('part') == 0){
            $report->section = 1;
            $report->r_status = 0;
        }
        $report->party_name = $request->input('party_name');
        if (Auth()->user()->type === 'electric') {
            // $report->f_status = 0;
        } elseif (Auth()->user()->type === 'admin') {
            // $report->r_status = 1;
        }
        try {
            $report->save();

            $mainreport = Report::where('sr_no_fiber', $request->input('sr_no_fiber'))->where('part', 0)->first();
            if($mainreport){
                $mainreport->section = 2;
                $mainreport->save();
            }

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
        }
        $report_id = $report->id;
        $avalabile = 0;
        $sub_category = $request->input('sub_category');
        $amount = 0;
        $TblStockinsertedIds = [];
        $TblStockupdateIds = [];
        $TblReportiteminsertedIds = [];
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
                        if ($dead == 1) {
                            $existingRecord->dead_status = 1;
                        }
                        $existingRecord->save();
                        $TblStockupdateIds[] = $existingRecord->id;
                    } else {
                        $avalabile = 1;
                        $invoice_no = SelectedInvoice::first()->invoice_no;
                        $invoice = tbl_purchase::where('invoice_no', $invoice_no)->first();
                        $date = $invoice->date;
                        $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                            ->where('scid', $request->sub_category[$index])
                            ->first();
                        $cid = $invoice_data->cid;
                        $serial_no_card_count = TblStock::where('invoice_no', $invoice_no)
                            ->where('scid', $request->sub_category[$index])
                            ->where('cid', $cid)
                            ->where('serial_no', $serial_no)
                            ->count();
                        if ($serial_no_card_count === 0) {
                            $newStock = TblStock::create([
                                'date' => $date,
                                'invoice_no' => $invoice_no,
                                'cid' => $cid,
                                'scid' => $request->sub_category[$index],
                                'serial_no' => $serial_no,
                                'qty' => $invoice_data->qty,
                                'price' => $invoice_data->total,
                                'priceofUnit' => $invoice_data->price,
                                'status' => 0,
                            ]);
                            $amount +=  $invoice_data->price;
                            $TblStockinsertedIds[] = $newStock->id;
                        } else {
                            $avalabile = 1;
                            try {
                                TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                            } catch (\Exception $e) {
                                return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                            }
                            if ($TblReportiteminsertedIds) {
                                TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                            }
                            if ($TblStockupdateIds) {
                                TblStock::whereIn('id', $TblStockupdateIds)->update(['status' => 0]);
                            }
                            $Record_delete = Report::where('id', $report_id)->first();
                            if ($Record_delete) {
                                $Record_delete->delete();
                            }
                            return redirect()->back()->with('error', 'Same Serial Number Found, Failed to store the report.');
                        }
                    }
                    $tbl_stock_id = TblStock::where('serial_no', $serial_no)->value('id');
                } elseif ($sr_no_or_not == 0) {
                    $invoice_no = SelectedInvoice::where('scid', $request->sub_category[$index])->first()->invoice_no;

                    $invoice = tbl_purchase::where('invoice_no', $invoice_no)->first();
                    // $invoice_no = $SelectedInvoice;
                    $date = $invoice->date;
                    $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                        ->where('scid', $request->sub_category[$index])
                        ->first();

                    if ($invoice_data == null) {
                        // dd( $request->sub_category[$index]);
                        $avalabile = 1;
                        try {
                            TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                        }
                        if ($TblReportiteminsertedIds) {
                            TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                        }
                        $Record_delete = Report::where('id', $report_id)->first();
                        if ($Record_delete) {
                            $Record_delete->delete();
                        }
                        $invoiceNo = $selectedInvoice ? $selectedInvoice->invoice_no : 'N/A';
                        $subCategoryName = $subCat ? $subCat->sub_category_name : 'Unknown';
                        return redirect()->back()->with('error',"Not enough quantity in stock for subcategory: $subCategoryName (Invoice No: $invoiceNo). Please check your stock report.");
                        // return redirect()->back()->with('error', '!! No purchase Found in Stock, Please Select Valid Invoice No for Stock !!.');
                    }
                    $cid = $invoice_data->cid;
                    $serial_no_card_count = TblStock::where('invoice_no', $invoice_no)
                        ->where('scid', $request->sub_category[$index])
                        ->where('cid', $cid)
                        ->where('serial_no', $serial_no)
                        ->count();
                    // dd($request->all(),$invoice_no,$invoice_data,$serial_no_card_count);
                    $existingRecord = TblStock::firstOrCreate(
                        [
                            'invoice_no' => $invoice_no, // Search criteria
                            'scid' => $request->sub_category[$index],
                            'serial_no' => $serial_no,
                        ],
                        [
                            'date' => $date,
                            'invoice_no' => $invoice_no,
                            'cid' => $cid,
                            'scid' => $request->sub_category[$index],
                            'qty' => $invoice_data->qty,
                            'price' => $invoice_data->total,
                            'priceofUnit' => $invoice_data->price,
                            'status' => 0,
                        ]
                    );
                    if ($existingRecord) {
                        $tbl_stock_id = $existingRecord->id;
                        $report_used_qty_counts = TblReportItem::where('tblstock_id', $tbl_stock_id)->get();
                        $report_used_qty = 0;
                        // dd($request->all(),$existingRecord);
                        foreach ($report_used_qty_counts as $report_used_qty_count) {
                            $report_used_qty += $report_used_qty_count->used_qty;
                        }

                        // dd($invoice_no,$invoice_data,$existingRecord, $report_used_qty_counts, $report_used_qty);
                        if ($report_used_qty > $existingRecord->qty) {
                            $avalabile = 1;
                            try {
                                TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                            } catch (\Exception $e) {
                                return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                            }
                            if ($TblReportiteminsertedIds) {
                                TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                            }
                            $Record_delete = Report::where('id', $report_id)->first();
                            if ($Record_delete) {
                                $Record_delete->delete();
                            }
                            // return redirect()->back()->with('error', 'Failed to store the report. You Not have a enough quantity in Stock, Please Check Your Stock Report.');
                            $invoiceNo = $invoice_no ? $invoice_no->invoice_no : 'N/A';
                            $subCategoryName = $subCat ? $subCat->sub_category_name : 'Unknown';
                            return redirect()->back()->with('error',"Not enough quantity in stock for subcategory: $subCategoryName (Invoice No: $invoiceNo). Please check your stock report.");
                        } elseif ($report_used_qty = $existingRecord->qty) {
                            $existingRecord->status = 1;
                        }
                        $amount += $existingRecord->priceofUnit;
                        if ($dead == 1) {
                            // $existingRecord->dead_status = 1;
                        }
                        $existingRecord->save();
                    } else {
                        $avalabile = 1;
                        try {
                            TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                        } catch (\Exception $e) {
                            return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                        }
                        if ($TblReportiteminsertedIds) {
                            TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                        }
                        $Record_delete = Report::where('id', $report_id)->first();
                        if ($Record_delete) {
                            $Record_delete->delete();
                        }
                        return redirect()->back()->with('error', 'Same Serial Number Found, Failed to store the report.');
                    }
                    $tbl_stock_id = TblStock::where('serial_no', $serial_no)
                        ->where('invoice_no', $invoice_no)
                        ->where('scid', $request->sub_category[$index])
                        ->value('id');
                } else {
                    return redirect()->back()->with('error', 'Please try again later, Failed to store the report.');
                }

                // make a find query for subcategory 
                $unit = tbl_sub_category::where('id', $request->sub_category[$index])->first()->unit ?? null;
                // dd($unit);

                $TblReportItem = new TblReportItem();
                $TblReportItem->scid = $request->sub_category[$index];
                $TblReportItem->unit = $unit;
                $TblReportItem->report_id = $report_id;
                $TblReportItem->tblstock_id = $tbl_stock_id;
                $TblReportItem->dead_status = $dead;
                $TblReportItem->sr_no = $request->srled[$index];
                $TblReportItem->amp = $request->ampled[$index] ?? null;
                $TblReportItem->volt = $request->voltled[$index] ?? null;
                $TblReportItem->watt = $request->wattled[$index] ?? null;
                if ($request->srled[$index] == '0') {
                    $TblReportItem->used_qty = $request->used_qty[$index];
                } else {
                    $TblReportItem->used_qty = 1;
                }
                try {
                    $TblReportItem->save();
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
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
        return redirect()->route('report.index')->with('success', 'Report added successfully.');
    }
    public function Newupdate(Request $request, $id)
    {
        // dd($request->all());
        if (Auth()->user()->type === 'electric' || Auth()->user()->type === 'cavity' || Auth()->user()->type === 'user' || Auth()->user()->type === 'admin') {
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
            // dd($request->all());
            $report = Report::find($id);
            if ($request->filled('worker_name'))
                $report->worker_name = $request->worker_name;
            if ($request->filled('sr_hr'))
                $report->sr_hr = $request->sr_hr;
            if ($request->filled('note1'))
                $report->note1 = $request->note1;
            if ($request->filled('note2'))
                $report->note2 = $request->note2;
            if ($request->filled('sr_no_fiber'))
                $report->sr_no_fiber = $request->sr_no_fiber;
            if ($request->filled('m_j'))
                $report->m_j = $request->m_j;
            if ($request->filled('type'))
                $report->type = $request->type;
            if ($request->filled('remark'))
                $report->remark = $request->remark;
            if (Auth()->user()->type === 'user') {
                $report->temp = 0;
            }
            $report->status = 0;
            $report->sale_status = 0;
            if ($request->part == 1) {
                $report->r_status = 0;
            }
            // $report->status = null;
            $report->save();
            $amount = $report->final_amount;
            $report_id = $id;
            $avalabile = 0;
            $sub_category = $request->input('sub_category');
            $TblStockinsertedIds = [];
            $TblReportiteminsertedIds = [];
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
                            if ($dead == 1) {
                                $existingRecord->dead_status = 1;
                            }
                            $existingRecord->save();
                        } else {
                            $avalabile = 1;
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
                                ->where('serial_no', $serial_no)
                                ->count();
                            if ($serial_no_card_count === 0) {
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
                                    'dead_status' => $dead,
                                ]);
                                $amount += 10;
                                $TblStockinsertedIds[] = $newStock->id;
                            } else {
                                $avalabile = 1;
                                try {
                                    TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                                } catch (\Exception $e) {
                                    return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                                }
                                if ($TblReportiteminsertedIds) {
                                    TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                                }
                                $Record_delete = Report::where('id', $report_id)->first();
                                if ($Record_delete) {
                                    $Record_delete->delete();
                                }
                                return redirect()->back()->with('error', 'Same Serial Number Found, Failed to store the report.');
                            }
                        }
                    } elseif ($sr_no_or_not == 0) {
                        $existingRecord = TblStock::where('serial_no', $serial_no)
                            ->where('status', 0)
                            ->first();
                        if ($existingRecord) {
                            $amount += $existingRecord->priceofUnit;
                            $existingRecord->save();
                        } else {
                            $avalabile = 1;
                            try {
                                TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                            } catch (\Exception $e) {
                                return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                            }
                            if ($TblReportiteminsertedIds) {
                                TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                            }
                            // $Record_delete = Report::where('id', $report_id)->first();
                            // if ($Record_delete) {
                            //     $Record_delete->delete();
                            // }
                            return redirect()->back()->with('error', 'Same Serial Number Found, Failed to store the report.');
                        }
                    } else {
                        return redirect()->back()->with('error', 'Please try again later, Failed to store the report.');
                    }
                    // find unit as per subcategory
                    $sub_category = $request->sub_category[$index];
                    $unit = tbl_sub_category::where('id', $sub_category)->value('unit');
                    $tbl_stock_id = TblStock::where('serial_no', $serial_no)->value('id');
                    $TblReportItem = new TblReportItem();
                    $TblReportItem->scid = $request->sub_category[$index];
                    $TblReportItem->unit = $unit;
                    $TblReportItem->report_id = $report_id;
                    $TblReportItem->dead_status = $dead;
                    $TblReportItem->tblstock_id = $tbl_stock_id;
                    $TblReportItem->sr_no = $request->srled[$index];
                    $TblReportItem->amp = $request->ampled[$index] ?? null;
                    $TblReportItem->volt = $request->voltled[$index] ?? null;
                    $TblReportItem->watt = $request->wattled[$index] ?? null;
                    try {
                        $TblReportItem->save();
                    } catch (\Exception $e) {
                        return redirect()->back()->with('error', 'Failed inserted records: ' . $e->getMessage());
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
        }
    }
    public function Latestupdate(Request $request, $id)
    {
        // dd($request->all());
        // Step 1: Backup old report items
        $oldReportItems = TblReportItem::where('report_id', $id)->get();
        // $ReportItems =  TblReportItem::where('report_id', $id)->get();
        // dd($ReportItems,$oldReportItems);
        try {
            // Check user type
            if (Auth()->user()->type === 'electric' || Auth()->user()->type === 'cavity' || Auth()->user()->type === 'user' || Auth()->user()->type === 'admin') {

                // Step 2: Back in stock old sr_no items
                foreach ($oldReportItems as $oldReportItem) {
                    if ($oldReportItem->sr_no != 0) {
                        $existingRecord = TblStock::where('serial_no', $oldReportItem->sr_no)
                            ->first();
                        if ($existingRecord) {
                            $existingRecord->status = 0;
                            $existingRecord->save();
                        }
                    }
                }

                // Step 3: Delete old report items
                TblReportItem::where('report_id', $id)->delete();

                // Validation for 'user' type
                if (Auth()->user()->type === 'user') {
                    $validator = Validator::make(
                        $request->all(),
                        [
                            'sr_no_fiber' => 'required|string|max:255',
                            'type' => 'required|string|max:255',
                        ]
                    );
                    if ($validator->fails()) {
                        $firstErrorMessage = $validator->errors()->first();
                        throw new \Exception($firstErrorMessage); // Throw exception with the first error message

                        // return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
                    }
                }

                // Find the report
                $report = Report::find($id);

                // Update report fields based on request data
                if ($request->filled('worker_name')) $report->worker_name = $request->worker_name;
                if ($request->filled('part')) $report->part = $request->part;
                if ($request->filled('sr_hr')) $report->sr_hr = $request->sr_hr;
                if ($request->filled('note1')) $report->note1 = $request->note1;
                if ($request->filled('note2')) $report->note2 = $request->note2;
                if ($request->filled('sr_no_fiber')) $report->sr_no_fiber = $request->sr_no_fiber;
                if ($request->filled('m_j')) $report->m_j = $request->m_j;
                if ($request->filled('temp')) $report->temp = $request->temp;
                if ($request->filled('type')) $report->type = $request->type;
                if ($request->filled('remark')) $report->remark = $request->remark;
                if ($request->filled('warranty')) $report->f_status  = $request->input('warranty') !== null ? $request->input('warranty') : 1;
                if($request->input('part') == 1){
                    $report->section = 2;
                }elseif($request->input('part') == 0){
                    $report->section = 1;
                }
                // Additional logic for 'user' type
                if (Auth()->user()->type === 'user') {
                    $report->temp = 0;
                }

                // Set report status
                $report->status = 0;
                $report->sale_status = 0;
                if ($request->part == 1) {
                    $report->r_status = 0;
                } elseif (Auth()->user()->type === 'electric' || Auth()->user()->type === 'cavity') {
                    $report->r_status = 1;
                }

                // Save the report
                $report->save();
                // throw new \Exception($report);
                // Initialize variables
                $amount = $report->final_amount;
                $report_id = $id;
                $avalabile = 0;
                $sub_category = $request->input('sub_category');
                $TblStockinsertedIds = [];
                $TblStockupdateIds = [];
                $TblReportiteminsertedIds = [];

                // Process new report items
                if ($sub_category) {
                    foreach ($request->srled as $index => $serial_no) {
                        $sr_no_or_not = $request->sr_no_or_not[$index];
                        $sub_cat = tbl_sub_category::where('id', $sub_category[$index])->first();
                        $dead = $request->dead[$index];

                        // Handle items with serial numbers
                        if ($sr_no_or_not == 1) {
                            $existingRecord = TblStock::where('serial_no', $serial_no)
                                ->where('scid', $sub_category[$index])
                                ->first();

                            if ($existingRecord) {
                                $amount += $existingRecord->priceofUnit;
                                $existingRecord->status = 1;
                                $existingRecord->dead_status = $dead;
                                $existingRecord->save();
                                $TblStockupdateIds[] = $existingRecord->id;
                                $tbl_stock_id = $existingRecord->id;
                            } else {
                                $invoice_no = SelectedInvoice::where('scid', $request->sub_category[$index])->first()->invoice_no;
                                $invoice = tbl_purchase::where('invoice_no', $invoice_no)->first();
                                $date = $invoice->date;
                                $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                                    ->where('scid', $request->sub_category[$index])
                                    ->first();
                                $cid = $invoice_data->cid;

                                $serial_no_count = TblStock::where('invoice_no', $invoice_no)
                                    ->where('scid', $request->sub_category[$index])
                                    ->where('serial_no', $serial_no)
                                    ->count();

                                if ($serial_no_count === 0) {
                                    $newStock = TblStock::create([
                                        'date' => $date,
                                        'invoice_no' => $invoice_no,
                                        'cid' => $cid,
                                        'scid' => $request->sub_category[$index],
                                        'serial_no' => $serial_no,
                                        'qty' => $invoice_data->qty,
                                        'price' => $invoice_data->total,
                                        'priceofUnit' => $invoice_data->price,
                                        'status' => 0,
                                        'dead_status' => $dead,
                                    ]);
                                    $TblStockinsertedIds[] = $newStock->id;
                                    $tbl_stock_id = $newStock->id;
                                }
                            }
                        }
                        // Handle items without serial numbers
                        elseif ($sr_no_or_not == 0) {
                            $invoice_no = SelectedInvoice::where('scid', $request->sub_category[$index])->first()->invoice_no;
                            $invoice = tbl_purchase::where('invoice_no', $invoice_no)->first();
                            $date = $invoice->date;
                            $invoice_data = tbl_purchase_item::where('invoice_no', $invoice_no)
                                ->where('scid', $request->sub_category[$index])
                                ->first();

                            if ($invoice_data == null) {
                                throw new \Exception('No purchase found in stock. Please select a valid invoice number.');
                            }

                            $cid = $invoice_data->cid;
                            $existingRecord = TblStock::firstOrCreate(
                                [
                                    'invoice_no' => $invoice_no,
                                    'serial_no' => $serial_no,
                                    'scid' => $request->sub_category[$index],
                                    'cid' => $cid,
                                ],
                                [
                                    'date' => $date,
                                    'invoice_no' => $invoice_no,
                                    'cid' => $cid,
                                    'scid' => $request->sub_category[$index],
                                    'qty' => $invoice_data->qty,
                                    'price' => $invoice_data->total,
                                    'priceofUnit' => $invoice_data->price,
                                    'status' => 0,
                                ]
                            );

                            if ($existingRecord) {
                                $tbl_stock_id = $existingRecord->id;
                                $report_used_qty = $request->used_qty[$index] ?? 0;
                                $report_used_qty_counts = TblReportItem::where('tblstock_id', $tbl_stock_id)->get();

                                foreach ($report_used_qty_counts as $report_used_qty_count) {
                                    $report_used_qty += $report_used_qty_count->used_qty;
                                }

                                if ($report_used_qty > $existingRecord->qty) {

                                    $scid = $request->sub_category[$index];
                                    $subCat = tbl_sub_category::find($sub_category[$index]);
                                    $selectedInvoice = SelectedInvoice::where('scid', $scid)->first();

                                    $invoiceNo = $selectedInvoice ? $selectedInvoice->invoice_no : 'N/A';
                                    $subCategoryName = $subCat ? $subCat->sub_category_name : 'Unknown';
                                    try {
                                        TblStock::whereIn('id', $TblStockinsertedIds)->delete();
                                    } catch (\Exception $e) {
                                        return redirect()->back()->with('error', 'Failed to delete inserted records: ' . $e->getMessage());
                                    }
                                    if ($TblReportiteminsertedIds) {
                                        TblReportItem::whereIn('id', $TblReportiteminsertedIds)->delete();
                                    }
                                    if ($TblStockupdateIds) {
                                        TblStock::whereIn('id', $TblStockupdateIds)->update(['status' => 0]);
                                    }

                                    throw new \Exception("Not enough quantity in stock for subcategory: $subCategoryName (Invoice No: $invoiceNo). Please check your stock report.");
                                } elseif ($report_used_qty == $existingRecord->qty) {
                                    $existingRecord->status = 1;
                                }

                                $amount += $existingRecord->priceofUnit;
                                $existingRecord->save();
                            } else {
                                throw new \Exception('Same serial number found. Failed to store the report.');
                            }

                            $tbl_stock_id = $existingRecord->id;
                        } else {
                            throw new \Exception('Invalid request. Please try again.');
                        }

                        // Create a new report item
                        $unit = tbl_sub_category::where('id', $request->sub_category[$index])->first()->unit ?? null;
                        $TblReportItem = new TblReportItem();
                        $TblReportItem->scid = $request->sub_category[$index];
                        $TblReportItem->unit = $unit;
                        $TblReportItem->report_id = $report_id;
                        $TblReportItem->tblstock_id = $tbl_stock_id;
                        $TblReportItem->dead_status = $dead;
                        $TblReportItem->sr_no = $request->srled[$index];
                        $TblReportItem->amp = $request->ampled[$index] ?? null;
                        $TblReportItem->volt = $request->voltled[$index] ?? null;
                        $TblReportItem->watt = $request->wattled[$index] ?? null;
                        $TblReportItem->used_qty = ($request->srled[$index] == '0') ? $request->used_qty[$index] : 1;
                        $TblReportItem->save();
                    }

                    // Update the final amount of the report
                    $Record_update_final_amount = Report::where('id', $report_id)->first();
                    $Record_update_final_amount->final_amount = $amount;
                    $Record_update_final_amount->save();

                    return redirect()->route('report.index')->with('success', 'Report added successfully.');
                }
            } elseif (Auth()->user()->type === 'account') {
                // Handle account user logic
                $report = Report::find($id);
                $report->status = $request->status;
                if ($request->status == 1) {
                    $report->sale_status = 0;
                    $report->stock_status = 1;
                    $report->section = 0;
                }
                $report->remark = $request->remark;
                $report->save();

                return redirect()->route('report.index')->with('success', 'Report updated successfully.');
            }
        } catch (\Exception $e) {
            // If an error occurs, restore the old report items
            TblReportItem::where('report_id', $id)->delete();
            foreach ($oldReportItems as $item) {
                TblReportItem::create($item->toArray());
            }
            return redirect()->back()->with('error', 'Failed to update the report: ' . $e->getMessage());
        }
    }
}
