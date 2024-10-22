<?php

namespace App\Http\Controllers;

use App\Models\tbl_purchase_item;
use App\Models\tbl_purchase;
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
        //
    }

    public function create(Request $request)
    {
        dd($request->all());
        // For Product
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required|unique:tbl_purchases,invoice_no',
            'data.*.cname' => 'required',
            'data.*.scname' => 'required',
            'data.*.unit' => 'required',
            'data.*.qty' => 'required',
            'data.*.rate' => 'required',
            'data.*.total' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $validatedData = $validator->validated();
        }

        // For Invoice 
        $inward = new tbl_purchase();
        $inward->date = $request->date;
        $inward->invoice_no = $request->invoice_no;
        $inward->pid = $request->party_name;
        $inward->amount = $request->amount_d;
        $inward->inr_rate = $request->rate_r;
        $inward->inr_amount = $request->amount_r;
        $inward->shipping_cost = $request->shipping_cost;
        $result = $inward->save();

        // dd($result);
        if ($result) {
            $allItemsSaved = true;
            foreach ($validatedData['data'] as $item) {
                $itemResult = tbl_purchase_item::create([
                    'invoice_no' => $request->invoice_no,
                    'cid' => $item['cname'],
                    'scid' => $item['scname'],
                    'qty' => $item['qty'],
                    'unit' => $item['unit'],
                    'price' => $item['rate'],
                    'total' => $item['total'],
                ]);
                if (!$itemResult) {
                    $allItemsSaved = false;
                    return redirect()->back()->with('error', 'Report cannot be deleted.');
                    // break;
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
        return view('inward.invoice', compact('inwards','inwardsItems'));
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
