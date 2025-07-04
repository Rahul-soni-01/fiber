<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\tbl_party;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use App\Models\Report;
use App\Models\TblCustomer;
use App\Models\Tbltype;
use App\Models\TblSaleReturn;
use App\Models\Replacement;
use App\Models\TblSaleProductCategory;
use App\Models\TblSaleProductSubCategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SaleController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Sale ?? [];
        return in_array($action, $permissions);
    }
    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            // $sales = Sale::with('customer')->get();

            if ($request->has('status')) {
                $status = $request->status;

                // Special case for Replacement (status 3)
                if ($status == 3) {
                    $replacements = Replacement::with('sale', 'item')->get();
                    return view('sale.onlysale', ['sales' => $replacements, 'isReplacement' => true]);
                }

                // Regular status filtering
                $sales = Sale::with('customer')
                    ->where('status', $status)
                    ->get();

                return view('sale.onlysale', ['sales' => $sales, 'isReplacement' => false]);
            }
            $sales = TblCustomer::with('sales')->get();

            $sales = $sales->filter(function ($customer) {
                return $customer->sales->isNotEmpty(); // Keep only customers with sales
            })->map(function ($customer) {
                $customer->total_sale_amount = $customer->sales->sum('amount');
                return $customer;
            });
            // dd($sales);
            return view('sale.index', compact('sales'));
        }
        return redirect('/unauthorized');
    }
    public function return_index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $salereturns = TblSaleReturn::selectRaw('sale_id, MAX(date) as max_date, SUM(qty) as total_qty, GROUP_CONCAT(reason) as reasons, MAX(customer_id) as cus')
                ->groupBy('sale_id')
                ->get();
            foreach ($salereturns as $index => $return) {
                $firstSaleReturn = TblSaleReturn::where('sale_id', $return->sale_id)
                    ->first();

                $firstSaleReturn->load('customer', 'category', 'subCategory');

                $return->customer = $firstSaleReturn->customer;
                $return->category = $firstSaleReturn->category;
                $return->subCategory = $firstSaleReturn->subCategory;
                $salereturns[$index] = $return;
            }
            return view('sale.ReturnIndex', compact('salereturns'));
        }
        return redirect('/unauthorized');
    }
    public function return_show(Request $request, $id)
    {
        if ($this->checkPermission($request, 'view')) {

            $salereturns = TblSaleReturn::with(['customer', 'category', 'subCategory'])
                ->where('sale_id', $id)
                ->get();
            // dd($salereturns);
            return view('sale.Returnshow', compact('salereturns', 'id'));
        }
        return redirect('/unauthorized');
    }
    public function return(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $sales = Sale::with('customer')->get();

            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $sale_product_categories = TblSaleProductCategory::all();
            $sale_product_subcategories = TblSaleProductSubCategory::all();
            $serial_nos = Report::where('status', '1')->where('sale_status', 1)
                ->where('part', '0')->get()->sortBy('sr_no_fiber');

            return view('sale.return', compact('sales', 'customers', 'inwards', 'items', 'serial_nos', 'sale_product_categories', 'sale_product_subcategories'));
            // return view('sale.return', compact('sales'));
        }
        return redirect('/unauthorized');
    }
    public function return_store(Request $request)
    {
        dd($request->all());
        if ($request->return_type  == "old") {
            $validator = Validator::make(
                $request->all(),
                [
                    // 'date' => 'required|date',
                    'customer_id' => 'required|integer|exists:tbl_customers,id',
                ],
                [
                    'saleitems.*.distinct' => 'The Sale Items must not have duplicates within the input.',
                ]
            );
        } else {
            $validator = Validator::make(
                $request->all(),
                [
                    // 'date' => 'required|date',
                    'customer_id' => 'required|integer|exists:tbl_customers,id',
                    'saleitems.*' => [
                        'required',
                        'distinct',
                        function ($attribute, $value, $fail) {
                            if (!DB::table('tbl_sales_items')->where('id', $value)->exists()) {
                                $fail("The Sale number {$value} does not exist in the reports.");
                            }
                        },
                    ],
                ],
                [
                    'saleitems.*.distinct' => 'The Sale Items must not have duplicates within the input.',
                ]
            );
            if ($validator->fails()) {
                $firstErrorMessage = $validator->errors()->first();
                return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
            } else {
                $count = count($request->saleitems);
                for ($i = 0; $i < $count; $i++) {
                    $saleitems = SaleItem::findOrFail($request->saleitems[$i]);
                    $saleeqty = $saleitems->qty;
                    $totalReturnedQty = TblSaleReturn::where('sale_id', $request->invoice_no)
                        ->where('customer_id', $request->pid)
                        ->where('scid', $saleitems->scname)
                        ->sum('qty');

                    if (($totalReturnedQty + $request->qty[$i]) <= $saleeqty) {
                        $sale_return = new TblSaleReturn();

                        $sale_return->date = date('Y-m-d');
                        $sale_return->customer_id = $request->customer_id;
                        $sale_return->sale_id = $request->sale_id;
                        $sale_return->qty = $request->qty[$i];
                        $sale_return->reason = $request->reason[$i];
                        $sale_return->sr_no = $saleitems->sr_no;
                        $sale_return->cid = $saleitems->cname;
                        $sale_return->scid = $saleitems->scname;
                        $sale_return->unit = $saleitems->unit;
                        $sale_return->price = $saleitems->rate;
                        $sale_return->save();

                        // Eloquent way to update tbl_reports where sr_no_fiber matches
                        if ($saleitems->sr_no != null) {
                            $report = Report::where('sr_no_fiber', $saleitems->sr_no)->where('part', 0)->where('sale_status', 1)->first();
                            if ($report) {
                                $report->sale_status = 1;
                                $report->stock_status = 1;
                                $report->r_status = 1;
                                $report->section = 0;
                                $report->save();
                            }
                        }
                    } else {
                        // If return quantity exceeds purchase quantity, show error
                        return redirect()->back()->withErrors([
                            'qty' => 'The returned quantity for product ' . $saleitems->scname . ' exceeds the Sale quantity.',
                        ]);
                    }

                    // Data Store in tbl_sale_returns 

                }

                return redirect()->route('sale.return.index')->with('success', 'Sale Return successfully.');
            }
        }
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $sale_product_categories = TblSaleProductCategory::all();
            $sale_product_subcategories = TblSaleProductSubCategory::all();
            $serial_nos = Report::where('status', '1')->where('sale_status', '!=', '1')->where('part', '0')->get()->sortBy('sr_no_fiber');
            $types = Tbltype::orderBy('id', 'asc')->get();
            // return view('sale.create', compact('customers', 'inwards', 'items', 'serial_nos'));
            return view('sale.newcreate', compact('sale_product_categories', 'sale_product_subcategories', 'types', 'customers', 'inwards', 'items', 'serial_nos'));
        }
        return redirect('/unauthorized');
    }
    public function repaircreate(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $sale_product_categories = TblSaleProductCategory::all();
            $sale_product_subcategories = TblSaleProductSubCategory::all();
            $serial_nos = Report::where('status', '1')->where('sale_status', '!=', '1')->where('part', '0')->get()->sortBy('sr_no_fiber');
            $types = Tbltype::orderBy('id', 'asc')->get();
            // dd($serial_nos);
            // return view('sale.create', compact('customers', 'inwards', 'items', 'serial_nos'));
            return view('sale.repaircreate', compact('sale_product_categories', 'sale_product_subcategories', 'types', 'customers', 'inwards', 'items', 'serial_nos'));
        }
        return redirect('/unauthorized');
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'sale_id' => 'required|unique:tbl_sales,sale_id',
            'date' => 'required|date',
            'cid' => 'required',
            'status' => 'required',
            'amount_r' => 'required|numeric',
            // 'repair_status' => 'required|numeric',
            'shipping_cost' => 'required|numeric',
            'round_total' => 'required|numeric',
            'amount' => 'required|numeric',
            'cname' => 'required|array',
            'cname.*' => 'required',
            'scname' => 'required|array',
            'scname.*' => 'required',
            'unit' => 'required|array',
            'unit.*' => 'required',
            'sr_no' => 'required|array',
            'sr_no.*' => [
                'nullable',
                'distinct', // Ensure all values in sr_no are unique in the request
            ],
            'qty' => 'required|array',
            'qty.*' => 'required',
            'rate' => 'required|array',
            'rate.*' => 'required',
            'p_tax' => 'required|array',
            'p_tax.*' => 'required',
            'total' => 'required|array',
            'total.*' => 'required',

        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sale = new Sale();
        if (empty($request->sale_id) || Sale::where('sale_id', $request->sale_id)->exists()) {
            // Get the maximum existing sale_id and increment it
            $maxId = Sale::max('sale_id');
            $sale->sale_id = $maxId ? $maxId + 1 : 1; // Start with 1 if no sales exist
        } else {
            $sale->sale_id = $request->sale_id;
        }
        $sale->customer_id = $request->cid;
        $sale->status = $request->status;
        $sale->repair_status = $request->repair_status;
        $sale->sale_date = $request->date;
        $sale->amount_r = $request->amount_r;
        $sale->shipping_cost = $request->shipping_cost;
        $sale->round_total = $request->round_total;
        $sale->amount = $request->amount;
        $sale->notes = $request->note;

        try {
            $sale->save();
            $count = count($request->sr_no);
            for ($i = 0; $i < $count; $i++) {
                $report_id = $request->sr_no[$i];
                $report = Report::with('reportItems')->where('sr_no_fiber', $report_id)->first();
                // dd($report);
                if ($report) {
                    // Update sale_status to 1
                    $report->sale_status = 1;
                    $report->stock_status = 0;
                    $report->outdate = $request->date;
                    $report->section = 4;
                    $report->save();
                    // dd($report,$request->cname[$i]);
                    $report_id = $report->id;
                    try {
                        $itemResult = SaleItem::create([
                            'sid' => $sale->id,
                            'sale_id' => $sale->sale_id,
                            // 'serial_no' => $serial_no,
                            'report_id' => $report_id, // Report ID
                            'cname' => $request->cname[$i],
                            'scname' => $request->scname[$i],
                            'unit' => $request->unit[$i],
                            'sr_no' => $request->sr_no[$i],
                            'qty' => $request->qty[$i],
                            'rate' => $request->rate[$i],
                            'p_tax' => $request->p_tax[$i],
                            'total' => $request->total[$i],
                        ]);
                    } catch (\Exception $e) {
                        // Catch any other exceptions and display a general error
                        return back()->with('error', 'An error occurred while saving the item: ' . $e->getMessage())->withInput();
                    }
                    // dd($itemResult);
                    if (!$itemResult) {
                        return redirect()->back()->with('error', 'Failed to insert sale');
                    }
                } else {
                    try {
                        $itemResult = SaleItem::create([
                            'sid' => $sale->id,
                            'sale_id' => $request->sale_id,
                            // 'serial_no' => $serial_no,
                            'report_id' => $report_id, // Report ID
                            'cname' => $request->cname[$i],
                            'scname' => $request->scname[$i],
                            'unit' => $request->unit[$i],
                            'sr_no' => $request->sr_no[$i],
                            'qty' => $request->qty[$i],
                            'rate' => $request->rate[$i],
                            'p_tax' => $request->p_tax[$i],
                            'total' => $request->total[$i],
                            'status' => 0,
                        ]);
                    } catch (\Exception $e) {
                        // Catch any other exceptions and display a general error
                        return back()->with('error', 'An error occurred while saving the item: ' . $e->getMessage())->withInput();
                    }
                }
            }

            return redirect()->route('sale.index')->with('success', 'Sale created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to insert sale: ' . $e->getMessage());
        }
    }

    public function replacement(Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $sale_product_categories = TblSaleProductCategory::all();
            $sale_product_subcategories = TblSaleProductSubCategory::all();
            $serial_nos = Report::where('status', '1')->where('sale_status', 1)->where('part', '0')->get()->sortBy('sr_no_fiber');
            $types = Tbltype::orderBy('id', 'asc')->get();
            $sales = Sale::with('items')->where('status', 0)->get();
            if ($request->query('cid') !== null) {
                $sales = Sale::with('items')->where('customer_id', $request->query('cid'))->get();
                // dd($sale);
            }
            // return view('sale.replacement');
            return view('sale.replacement', compact('sale_product_categories', 'sale_product_subcategories', 'types', 'customers', 'inwards', 'items', 'serial_nos', 'sales'));
        }
    }

    public function ItemReplacement(Request $request, $id)
    {
        $saleItem = SaleItem::with('sale', 'report')->find($id);
        $serial_nos = Report::where('status', '1')->where('sale_status', '!=', '1')->where('part', '0')->get()->sortBy('sr_no_fiber');
        return view('sale.ItemReplacement', compact('saleItem', 'serial_nos'));
    }

    public function replacementstore(Request $request)
    {

        $saleItem = SaleItem::with('sale', 'report')->find($request->item_id);
        $report = Report::with('tbl_leds', 'tbl_cards', 'tbl_leds.tbl_sub_category')->findOrFail($request->report_id);
        // dd($report->sr_no_fiber);
        if ($saleItem) {

            $saleItem->status = 1;
            $saleItem->save();
            $itemResult = SaleItem::create([
                'sid' => $saleItem->sid,
                'sale_id' => $saleItem->sale_id,
                // 'serial_no' => $serial_no,
                'report_id' => $request->report_id, // Report ID
                'cname' => $saleItem->cname,
                'scname' => $saleItem->scname,
                'unit' => $saleItem->unit,
                'sr_no' => $report->sr_no_fiber,
                'qty' => $saleItem->qty,
                'rate' => $saleItem->rate,
                'p_tax' => $saleItem->p_tax,
                'total' => $saleItem->total,
            ]);

            if (!$itemResult) {
                return redirect()->back()->with('error', 'Failed to insert sale');
                // throw new \Exception('Failed to insert sale Item');
            }
        }

        $replacement = Replacement::create([
            'sale_id' =>  $saleItem->sale_id,
            'old_item_id' => $request->item_id,
            'new_item_id' => $itemResult->id,
            'date' => $request->date,
            'old_sr_no' => $saleItem->sr_no,
            'new_sr_no' => $report->sr_no_fiber,
            'note' => $request->note,

        ]);
        if (!$replacement) {
            return redirect()->back()->with('error', 'Failed to insert Replacment');
            // throw new \Exception('Failed to insert sale Item');
        }
        if ($report) {
            $report->sale_status = 1;
            $report->stock_status = 1;
            $report->section = 4;
            $report->save();
        }


        return redirect()->route('sale.index')->with('success', 'Replacement created successfully.');
    }
    public function show(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $sale = Sale::with([
                'items' => function ($query) {
                    $query->where('status', 0); // Exclude replaced items
                },
                'customer',
                'items.report',
                'items.category',
                'items.subCategory'
            ])->findOrFail($id);
            // dd($sale);
            return view('sale.show', compact('sale'));
        }
        return redirect('/unauthorized');
    }

    public function standby(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $sale = Sale::with(['items', 'customer', 'items.report'])->findOrFail($id);
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $sale_product_categories = TblSaleProductCategory::all();
            $sale_product_subcategories = TblSaleProductSubCategory::all();
            $serial_nos = Report::where(function ($query) use ($sale) {
                $query->where('status', '1')
                    ->where('part', '0')
                    ->where(function ($q) use ($sale) {
                        $q->where('sale_status', 0) // Include unsold serial numbers
                            ->orWhereIn('id', $sale->items->pluck('report.sale_id'));
                    });
            })->get()->sortBy('sr_no_fiber');
            // dd($sale,$customers,$inwards,$items,$serial_nos);
            return view('sale.standbyreturn', compact('sale', 'customers', 'inwards', 'items', 'serial_nos', 'sale_product_categories', 'sale_product_subcategories', 'id'));
        }
        return redirect('/unauthorized');
    }

    public function standbystore(Request $request, $id)
    {
        // dd($id,$request->all());
        if ($this->checkPermission($request, 'edit')) {
            $oldsaleItems = SaleItem::where('sid', $id)->get();
            try {
                foreach ($oldsaleItems as $oldsaleItem) {
                    $report = Report::with('tbl_leds', 'tbl_cards', 'tbl_leds.tbl_sub_category')->where('id', $oldsaleItem->report_id)->first();
                    $report->sale_status = 0;
                    $report->stock_status = 1;
                    $report->save();
                }
                $sale = Sale::with(['items', 'customer', 'items.report'])->findOrFail($id);
                $sale->status = $request->status;
                $sale->repair_status = $request->repair_status ?? 0;
                $sale->sale_date = $request->date;
                $sale->notes = $request->note;
                $sale->save();
                return redirect()->route('sale.index')->with('success', 'Stock Update successfully.');
            } catch (\Exception $e) {
                SaleItem::where('report_id', $id)->delete();
                foreach ($oldsaleItems as $item) {
                    SaleItem::create($item->toArray());
                }
                return redirect()->back()->with('error', 'Failed to update the report: ' . $e->getMessage());
            }
        }
    }

    public function edit(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $sale = Sale::with(['items', 'customer', 'items.report'])->findOrFail($id);
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $sale_product_categories = TblSaleProductCategory::all();
            $sale_product_subcategories = TblSaleProductSubCategory::all();
            $serial_nos = Report::where(function ($query) use ($sale) {
                $query->where('status', '1')
                    ->where('part', '0')
                    ->where(function ($q) use ($sale) {
                        $q->where('sale_status', 0) // Include unsold serial numbers
                            ->orWhereIn('id', $sale->items->pluck('report.sale_id'));
                    });
            })->get()->sortBy('sr_no_fiber');
            // dd($sale);
            return view('sale.edit', compact('sale', 'customers', 'inwards', 'items', 'serial_nos', 'sale_product_categories', 'sale_product_subcategories'));
        }
        return redirect('/unauthorized');
    }

    public function update(Request $request, $id)
    {
        if ($this->checkPermission($request, 'edit')) {
            $oldsaleItems = SaleItem::where('sid', $id)->get();
            try {
                foreach ($oldsaleItems as $oldsaleItem) {
                    $report = Report::where('id', $oldsaleItem->report_id)->first();
                    $report->sale_status = 0;
                    $report->save();
                }
                $delete = SaleItem::where('sid', $id)->delete();

                if (!$delete) {
                    throw new \Exception('Failed to delete sale item');
                }

                $sale = Sale::with(['items', 'customer', 'items.report'])->findOrFail($id);
                $sale->sale_id = $request->sale_id;
                $sale->customer_id = $request->cid;
                $sale->status = $request->status;
                $sale->repair_status = $request->repair_status ?? 0;
                $sale->sale_date = $request->date;
                $sale->amount_r = $request->amount_r;
                $sale->shipping_cost = $request->shipping_cost;
                $sale->round_total = $request->round_total;
                $sale->amount = $request->amount;
                $sale->notes = $request->note;
                $sale->save();
                $count = count($request->sr_no);
                for ($i = 0; $i < $count; $i++) {
                    $sr = $request->sr_no[$i];
                    // dd($request->all(),$sale, $sr,$report);
                    $report = Report::where('sr_no_fiber', $sr)
                        ->where('part', 0)
                        ->where('sale_status', 0)
                        ->first();

                    if (!$report) {
                        throw new \Exception("No available report found for SR No: $sr");
                    }
                    $report->sale_status = 1;
                    $report->save();
                    $report_id = $report->id;
                    try {
                        $itemResult = SaleItem::create([
                            'sid' => $sale->id,
                            'sale_id' => $request->sale_id,
                            // 'serial_no' => $serial_no,
                            'report_id' => $report_id, // Report ID
                            'cname' => $request->cname[$i],
                            'scname' => $request->scname[$i],
                            'unit' => $request->unit[$i],
                            'sr_no' => $request->sr_no[$i],
                            'qty' => $request->qty[$i],
                            'rate' => $request->rate[$i],
                            'p_tax' => $request->p_tax[$i],
                            'total' => $request->total[$i],
                        ]);
                        // dd($itemResult);
                        if (!$itemResult) {
                            // return redirect()->back()->with('error', 'Failed to insert sale');
                            throw new \Exception('Failed to insert sale Item');
                        }
                    } catch (\Exception $e) {
                        // Catch any other exceptions and display a general error
                        throw new \Exception('No purchase found in stock. Please select a valid invoice number.');
                    }
                }

                return redirect()->route('sale.index')->with('success', 'Sale created successfully.');
            } catch (\Exception $e) {
                dd("catch");
                // If an error occurs, restore the old report items
                SaleItem::where('report_id', $id)->delete();
                foreach ($oldsaleItems as $item) {
                    SaleItem::create($item->toArray());
                }
                return redirect()->back()->with('error', 'Failed to update the report: ' . $e->getMessage());
            }
        }
    }

    public function history(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            if ($request->sr_no) {
                $serial_no = $request->sr_no;
                $reports = Report::with('tbl_leds', 'tbl_leds.tbl_sub_category')
                    ->where('sr_no_fiber', $serial_no)
                    ->get();

                $reportsid = $reports->pluck('id');

                $saleitems = SaleItem::with('sale')
                    ->whereIn('report_id', $reportsid)
                    ->get();

                $sale_ids = $saleitems->pluck('sale_id');

                $sales = Sale::with('items', 'customer', 'items.report')
                    ->whereIn('id', $sale_ids)
                    ->get();

                $Salereturns = TblSaleReturn::with(['customer'])
                    ->where('sr_no', $serial_no)
                    ->get();
                // dd($sales);

                return view('sale.history', compact('reports', 'sales', 'saleitems', 'Salereturns'));
            }
            return view('sale.history');
        }
        return redirect('/unauthorized');
    }

    public function getInvoiceDetails(Request $request)
    {

        $data = Sale::with('customer')->where('customer_id', $request->customer)->where('sale_id', $request->invoice_no)->get();

        if (count($data) > 0) {
            $inwardsItems = SaleItem::with(['sale', 'Report', 'category', 'subCategory'])
                ->where('sale_id', $request->invoice_no)
                ->get();

            // dd($inwardsItems);
            foreach ($inwardsItems as $inwardsItem) {
                $cid = $inwardsItem->cname;
                $scid = $inwardsItem->scname;
                $invoice_no = $inwardsItem->sale_id;

                $returns = TblSaleReturn::where('cid', $cid)
                    ->where('scid', $scid)
                    ->where('sale_id', $invoice_no)
                    ->get();
                $qty = 0;
                foreach ($returns as $return) {
                    $qty += $return->qty;
                }
                $inwardsItem['return'] = $qty;
            }
            $response = [
                'status' => 'success',
                'sale' => 'sale',
                'data' => $data,
                'inwardsItems' => $inwardsItems,
            ];
        } else {
            $response = [
                'status' => 'error',
                'message' => 'No data found',
            ];
        }
        return response()->json($response, 200);
    }
}
