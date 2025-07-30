<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\tbl_purchase_item;
use App\Models\tbl_purchase;
use App\Models\TblPurchaseReturnItem;
use App\Models\tbl_sub_category;
use App\Models\SelectedInvoice;
use App\Models\TblReportItem;
use App\Models\TblStock;
use App\Models\tbl_category;
use App\Models\tbl_party;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TblPurchaseItemController extends Controller
{
    public function view()
    {

        $inwards = tbl_purchase_item::all();
        return view('show_srno', compact('inwards'));
    }

    public function index()
    {
        $invoices = tbl_purchase::with('party')->get();
        $selectedInvoices = SelectedInvoice::pluck('invoice_no', 'scid')->toArray();

        $subcategories = tbl_sub_category::with('category')->get();
        // dd($subcategories);
        return view('inward.PurInvoiceindex', compact('invoices', 'selectedInvoices', 'subcategories'));
    }
    public function select(Request $request)
    {

        if ($request->selectAll == 0) {
            // Validate that scid (subcategories) and invoice_no are arrays and required
            $request->validate([
                'scid' => 'required|array',
                'scid.*' => 'exists:tbl_sub_categories,id',
                'invoice_no' => 'required|array',
                'invoice_no.*' => 'exists:tbl_purchases,invoice_no',
            ]);
            SelectedInvoice::query()->truncate();
            foreach ($request->scid as $key => $scid) {
                SelectedInvoice::create(['invoice_no' => $request->invoice_no[$key], 'scid' => $scid]);
            }
        } elseif ($request->selectAll == 1) {
            // Validate that a single invoice is selected
            $request->validate([
                'invoice_no' => 'required|exists:tbl_purchases,invoice_no',
            ]);
            SelectedInvoice::query()->truncate();
            $subcategories = tbl_sub_category::all();
            foreach ($subcategories as $subcategory) {
                SelectedInvoice::create(['invoice_no' => $request->invoice_no, 'scid' => $subcategory->id]);
            }
        }

        // SelectedInvoice::create(['invoice_no' => $request->invoice_no]);

        return redirect()->route('invoices.index')->with('success', 'Invoice selected successfully');
    }
    public function create(Request $request)
    {
        // dd($request->all());
        // For Product
        $validator = Validator::make($request->all(), [
            // 'invoice_no' => 'required|unique:tbl_purchases,invoice_no',
            'cname' => 'required|array',
            'scname' => 'required|array',
            'unit' => 'required|array',
            'qty' => 'required|array',
            'rate' => 'required|array',
            'total' => 'required|array',
            'amount_d' => 'required',
            'rate_r' => 'required',
            'amount_r' => 'required',
            'shipping_cost' => 'required',
            'round_total' => 'required',
            'main_category' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $inward = new tbl_purchase();
        // For Invoice 
        if (empty($request->invoice_no) || tbl_purchase::where('invoice_no', $request->invoice_no)->exists()) {
            // Get the maximum existing invoice_no and increment it
            $maxId = tbl_purchase::max('invoice_no') ?? 0;
            $inward->invoice_no = $maxId ? $maxId + 1 : 1; // Start with 1 if no purchase exist
        } else {
            $inward->invoice_no = $request->invoice_no;
        }

        $inward->main_category = $request->main_category;
        $inward->date = $request->date;
        $inward->currency = $request->currency;
        $inward->pid = $request->party_name;
        $inward->amount = $request->amount_d;
        $inward->inr_rate = $request->rate_r;
        $inward->inr_amount = $request->amount_r;
        $inward->shipping_cost = $request->shipping_cost;
        $inward->round_amount = $request->round_total ?? 0;
        $result = $inward->save();

        /*$purchaseid = $result->id;

        dd($purchaseid);
        if($request->amount_paid > 0){
            $payment = new TblPayment();
            $payment->purchase_id = $purchaseid;
            $payment->amount_paid = $request->amount_paid;
            $payment->remaining_amount = $request->remaining_amount;
            $payment->payment_date = $request->date;
            $payment->payment_method = $request->payment_method;
            $data = $payment->save();
        }*/

        if ($result) {
            $allItemsSaved = true;
            $count = count($request->cname);

            for ($i = 0; $i < $count; $i++) {
                $itemResult = tbl_purchase_item::create([
                    'invoice_no' => $inward->invoice_no,
                    'cid' => $request->cname[$i],
                    'scid' => $request->scname[$i],
                    'qty' => $request->qty[$i],
                    'unit' => $request->unit[$i],
                    'tax' => $request->p_tax[$i],
                    'price' => $request->rate[$i] ?? 0,
                    'total' => $request->total[$i],
                ]);

                if (!$itemResult) {
                    $allItemsSaved = false;
                    break;
                }
            }

            if ($allItemsSaved) {
                return redirect('inward')->with('success', 'Purchase and items saved successfully!');
            } else {
                return redirect()->back()->with('error', 'Some purchase items could not be saved.');
            }
        } else {
            return redirect()->back()->with('error', 'Failed to save purchase.');
        }
    }

    public function getInvoiceDetails(Request $request)
    {
        if ($request->filled('status')) {
            $data = tbl_purchase::with('party')->where('pid', $request->party)->where('invoice_no', $request->invoice_no)->get();

            if (count($data) > 0) {

                $inwardsItems = tbl_purchase_item::with(['category', 'subCategory'])
                    ->where('invoice_no', $request->invoice_no)
                    ->get();

                foreach ($inwardsItems as $inwardsItem) {
                    $cid = $inwardsItem->cid;
                    $scid = $inwardsItem->scid;
                    $invoice_no = $inwardsItem->invoice_no;

                    $returns = TblPurchaseReturnItem::where('cid', $cid)->where('scid', $scid)->where('invoice_no', $invoice_no)->get();
                    $returnqty = 0;
                    foreach ($returns as $return) {
                        $returnqty += $return->qty;
                    }

                    $inwardsItem['return'] = $returnqty;

                    $TblStockdata = TblStock::where('scid', $scid)->where('invoice_no', $invoice_no)->get();

                    [$report_qty, $dead_report_qty] = $TblStockdata->flatMap(function ($TblStock) {
                        return TblReportItem::where('tblstock_id', $TblStock->id)->get();
                    })->reduce(function ($carry, $usedinreport) {
                        $carry[0] += $usedinreport->used_qty;
                        if ($usedinreport->dead_status == 1) {
                            $carry[1] += $usedinreport->used_qty;
                        }
                        return $carry;
                    }, [0, 0]);

                    $inwardsItem['dead_report_qty'] = $dead_report_qty;
                    $inwardsItem['report_qty'] = $report_qty;
                }

                $response = [
                    'status' => 'success',
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

        $query = tbl_purchase_item::with(['category', 'subCategory']);

        if ($request->filled('invoice_no')) {
            $query->where('invoice_no', $request->invoice_no);
        }
        if ($request->filled('category_id')) {
            $query->where('cid', $request->category_id);
        }
        if ($request->filled('subcategory_id')) {
            $query->where('scid', $request->subcategory_id);
        }

        $data = $query->get();
        // dd($data);

        $response = [
            'status' => 'success',
            'data' => $data
        ];

        if ($request->filled('category_id')) {
            $response['category_id'] = $request->category_id;
        }
        if ($request->filled('subcategory_id')) {
            $response['subcategory_id'] = $request->subcategory_id;
        }
        return response()->json($response, 200);
    }


    public function store(Request $request)
    {
        //
    }


    public function show_item($invoice_no)
    {
        $inwardsItems = tbl_purchase_item::with(['category', 'subCategory'])
            ->where('invoice_no', $invoice_no)
            ->get();

        $inwards = tbl_purchase::with('party')
            ->where('invoice_no', $invoice_no)
            ->orderBy('id', 'asc')
            ->get();

        // Combine the two collections
        return view('inward.invoice', compact('inwards', 'inwardsItems', 'invoice_no'));
    }


    public function edit($id, Request $request)
    {
        $inward = tbl_purchase::with('party','Items')
            ->where('invoice_no', $id)
            ->orderBy('id', 'asc')
            ->first();
        $inwardsItems = tbl_purchase_item::with(['category', 'subCategory'])
            ->where('invoice_no', $id)
            ->get();
        // $inward = tbl_purchase_item::with('Items')->where('invoice_no',$id)->get();
        
        $inwards = tbl_category::all();
        $items = tbl_sub_category::all();
        $partyname = tbl_party::all();
        $main_category = $request->query('main_category')?? null;

        if($main_category){
            $inwards = tbl_category::where('main_category', $main_category)->get();
        }
        return view('inward.edit', compact('inward', 'inwards', 'items', 'partyname','inwardsItems'));
    }




    public function update(Request $request, $invoice_no)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'cname' => 'required|array',
            'scname' => 'required|array',
            'unit' => 'required|array',
            'qty' => 'required|array',
            'rate' => 'required|array',
            'total' => 'required|array',
            'amount_d' => 'required',
            'rate_r' => 'required',
            'amount_r' => 'required',
            'shipping_cost' => 'required',
            'round_total' => 'required',
            // 'main_category' => 'required',   
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $inward = tbl_purchase::where('invoice_no', $invoice_no)->firstOrFail();
        // $inward->main_category = $request->main_category;
        $inward->date = $request->date;
        $inward->amount = $request->amount_d;
        $inward->inr_rate = $request->rate_r;
        $inward->inr_amount = $request->amount_r;
        $inward->shipping_cost = $request->shipping_cost;
        $inward->round_amount = $request->round_total;
        $inward->save();

        // Delete old items and re-insert
        tbl_purchase_item::where('invoice_no', $invoice_no)->delete();

        $count = count($request->cname);
        for ($i = 0; $i < $count; $i++) {
            tbl_purchase_item::create([
                'invoice_no' => $invoice_no,
                'cid' => $request->cname[$i],
                'scid' => $request->scname[$i],
                'qty' => $request->qty[$i],
                'unit' => $request->unit[$i],
                'tax' => $request->p_tax[$i] ?? 0,
                'price' => $request->rate[$i] ?? 0,
                'total' => $request->total[$i],
            ]);
        }

        return redirect()->route('inward.index')->with('success', 'Purchase updated successfully.');
    }

    public function destroy(tbl_purchase_item $tbl_purchase_item)
    {
        //
    }
}
