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
use App\Models\TblSaleReturn;
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
            $sales = Sale::with('customer')->get();

            return view('sale.index', compact('sales'));
        }
        return redirect('/unauthorized');
    }
    public function return_index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $salereturns = TblSaleReturn::with('customer')->get();
            // dd($salereturns);
            return view('sale.ReturnIndex', compact('salereturns'));
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
            $serial_nos = Report::where('status', '1')->where('sale_status', 1)
                ->where('part', '0')->get()->sortBy('sr_no_fiber');

            return view('sale.return', compact('sales', 'customers', 'inwards', 'items', 'serial_nos'));
            // return view('sale.return', compact('sales'));
        }
        return redirect('/unauthorized');
    }

    public function return_store(Request $request)
    {

        $validator = Validator::make(
            $request->all(),
            [
                'date' => 'required|date',
                'cid' => 'required|integer|exists:tbl_customers,id',
                'serial_no.*' => [
                    'required',
                    'distinct',
                    function ($attribute, $value, $fail) {
                        if (!DB::table('tbl_reports')->where('sr_no_fiber', $value)->exists()) {
                            $fail("The serial number {$value} does not exist in the reports.");
                        }
                    },
                ],
            ],
            [
                'serial_no.*.distinct' => 'The serial numbers must not have duplicates within the input.',
            ]
        );

        if ($validator->fails()) {
            $firstErrorMessage = $validator->errors()->first();
            return redirect()->back()->withErrors($validator)->withInput()->with('error', $firstErrorMessage);
        } else {
            $count = count($request->serial_no);
            for ($i = 0; $i < $count; $i++) {
                // Data Store in tbl_sale_returns 
                $sale_return = new TblSaleReturn();
                $sale_return->date = $request->date;
                $sale_return->c_id = $request->cid;
                $sale_return->sr_no = $request->serial_no[$i];
                $sale_return->save();

                // Eloquent way to update tbl_reports where sr_no_fiber matches
                $report = Report::where('sr_no_fiber', $request->serial_no[$i])->where('part', 0)->where('sale_status', 1)->first();
                if ($report) {
                    $report->sale_status = 0;
                    $report->save();
                }
            }

            return redirect()->route('sale.return.index')->with('success', 'Sale Return successfully.');
        }
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $serial_nos = Report::where('status', '1')->where('sale_status', '!=', '1')->where('part', '0')->get()->sortBy('sr_no_fiber');

            return view('sale.create', compact('customers', 'inwards', 'items', 'serial_nos'));
        }
        return redirect('/unauthorized');

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required|unique:tbl_sales,sale_id',
            'total_amount' => 'required|numeric',
            'date' => 'required|date',
            'serial_no.*' => [
                'required',
                'distinct',
                function ($attribute, $value, $fail) {
                    if (!DB::table('tbl_reports')->where('id', $value)->exists()) {
                        $fail("The serial number {$value} does not exist in the reports.");
                    }
                },
            ],
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sale = new Sale();
        $sale->sale_id = $request->invoice_no;
        $sale->customer_id = $request->cid;
        $sale->total_amount = $request->total_amount;
        $sale->sale_date = $request->date;
        $sale->notes = $request->note;

        try {
            $sale->save();
            $count = count($request->serial_no);

            for ($i = 0; $i < $count; $i++) {
                $report_id = $request->serial_no[$i];
                $report = Report::with('tbl_leds', 'tbl_cards', 'tbl_leds.tbl_sub_category')->find($report_id);

                if ($report) {
                    // Update sale_status to 1
                    $report->sale_status = 1;
                    $report->save();

                    $serial_no = $report->sr_no_fiber;
                    $final_amount = $report->final_amount;

                    $itemResult = SaleItem::create([
                        'sale_id' => $sale->id,
                        'serial_no' => $serial_no,
                        'report_id' => $report_id,
                        'quantity' => 1,
                        'price' => $final_amount,
                        'total' => $final_amount,
                    ]);

                    if (!$itemResult) {
                        return redirect()->back()->with('error', 'Failed to insert sale');
                    }
                } else {
                    return redirect()->back()->with('error', 'Failed to insert sale');
                }
            }

            return redirect()->route('sale.index')->with('success', 'Sale created successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to insert sale: ' . $e->getMessage());
        }
    }
    public function show(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $sale = Sale::with(['items', 'customer', 'items.report'])->findOrFail($id);
            // dd($sale);
            return view('sale.show', compact('sale'));
        }
        return redirect('/unauthorized');
    }

    public function edit(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $sale = Sale::with(['items', 'customer', 'items.report'])->findOrFail($id);
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();

            $serial_nos = Report::where(function ($query) use ($sale) {
                $query->where('status', '1')
                    ->where('part', '0')
                    ->where(function ($q) use ($sale) {
                        $q->where('sale_status', 0) // Include unsold serial numbers
                            ->orWhereIn('id', $sale->items->pluck('report.id'));
                    });
            })->get()->sortBy('sr_no_fiber');
            // dd($sale);
            return view('sale.edit', compact('sale', 'customers', 'inwards', 'items', 'serial_nos'));
        }
        return redirect('/unauthorized');
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
            
            $sales = Sale::with('items','customer','items.report')
            ->whereIn('id', $sale_ids)
            ->get();
            
            $Salereturns = TblSaleReturn::with(['customer'])
            ->where('sr_no',$serial_no)
            ->get();
                // dd($sales);

                return view('sale.history', compact('reports','sales','saleitems','Salereturns'));
            }
            return view('sale.history');
        }
        return redirect('/unauthorized');
    }
}
