<?php

namespace App\Http\Controllers;

use App\Models\tbl_purchase_item;
use App\Models\tbl_purchase;
use App\Models\TblPurchaseReturnItem;
use App\Models\TblPayment;
use App\Models\SelectedInvoice;
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
        $SelectedInvoice = SelectedInvoice::all();
        // dd($SelectedInvoice);
        return view('inward.PurInvoiceindex', compact('invoices', 'SelectedInvoice'));
    }
    public function select(Request $request)
    {
        
        $request->validate(['invoice_no' => 'required']);
        SelectedInvoice::query()->delete(); // Clear previous selection
        SelectedInvoice::create(['invoice_no' => $request->invoice_no]);

        return redirect()->route('invoices.index')->with('success', 'Invoice selected successfully');
    }
    public function create(Request $request)
    {
        // dd($request->all());
        // For Product
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required|unique:tbl_purchases,invoice_no',
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
        // For Invoice 
        $inward = new tbl_purchase();
        $inward->main_category = $request->main_category;
        $inward->date = $request->date;
        $inward->invoice_no = $request->invoice_no;
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
                    'invoice_no' => $request->invoice_no,
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

                    foreach($inwardsItems as $inwardsItem){
                        $cid = $inwardsItem->cid;
                        $scid = $inwardsItem->scid;
                        $invoice_no = $inwardsItem->invoice_no;
                
                        $returns = TblPurchaseReturnItem::where('cid',$cid)->where('scid', $scid)->where('invoice_no', $invoice_no)->get();
                        $qty = 0;
                        foreach($returns as $return){
                            $qty += $return->qty;
                        }
                        $inwardsItem['return'] = $qty;
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
        return view('inward.invoice', compact('inwards', 'inwardsItems','invoice_no'));
    }


    public function edit(tbl_purchase_item $tbl_purchase_item)
    {
        //
    }


    public function update(Request $request, tbl_purchase_item $tbl_purchase_item)
    {
        //
    }


    public function destroy(tbl_purchase_item $tbl_purchase_item)
    {
        //
    }
}
