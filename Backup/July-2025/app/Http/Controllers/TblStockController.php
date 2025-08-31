<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblStock;
use App\Models\tbl_sub_category;
use App\Models\tbl_category;
use App\Models\tbl_purchase;
use App\Models\tbl_purchase_item;
use App\Models\Report;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TblStockController extends Controller
{
    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'cid' => 'required',
            'scid' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
            'sr_no' => 'required',
            'serial_no' => ['nullable', 'array'],
            // 'serial_no.*' => ['nullable', 'regex:/^[A-Za-z]{6}\d{4}$/'],
            'serial_no.*' => ['nullable', 'string'], // Just ensure it's a string

        ], [
            'serial_no.*.regex' => 'Each Serial Number Must Be String Format.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // dd($request->all());
        $invoice_no = $request->invoice_no; 
        $inwards = tbl_purchase::with('party')->where('invoice_no', $invoice_no)->first();
        $existingrecord = TblStock::where('invoice_no', $invoice_no)
        ->where('cid', $request->cid)
        ->where('scid', $request->scid)
        ->count();
        
        $inwardsItems = tbl_purchase_item::with(['category', 'subCategory'])
        ->where('invoice_no', $invoice_no)
        ->where('cid', $request->cid)
        ->where('scid', $request->scid)
        ->get();
        $totalQty = 0;
        $totalprice = 0;

        foreach ($inwardsItems as $item) {
            $totalQty += $item->qty;
            $totalprice += $item->total;
        }
        $finalqty =  $request->qty + $existingrecord;
        // dd($inwardsItems, $totalQty, $finalqty);
        if( $totalQty < $finalqty){
            return redirect()->back()->withErrors("Error: You cannot enter more than the available quantity ($totalQty).")->withInput();
        }
        $price = $totalprice / $totalQty;
        $serial_no_list = $request->serial_no ?? [0];

        if($request->sr_no != null && $request->sr_no != 0){    
            $serialNumbers = explode("\n", $request->sr_no);
            $serial_no_list = array_map('trim', $serialNumbers);
            $serial_no_list = array_filter($serial_no_list); // Remove empty values
            $errors = [];
            if (empty($serial_no_list)) {
                $errors['sr_no'] = 'Please enter at least one valid serial number.';
            }
           
            foreach ($serial_no_list as $serial) {
                // if (!preg_match('/^[A-Za-z]{6}\d{4}$/', $serial)) {
                //     $errors['sr_no'] = 'Each serial number must have exactly 6 letters followed by 4 digits (e.g., ABCDEF1234).';
                //     break;
                // }
            
                // Check uniqueness in tbl_stock table
                if (\DB::table('tbl_stock')->where('serial_no', $serial)->exists()) {
                    $errors['sr_no'] = "The serial number '$serial' already exists in stock.";
                    break;
                }
            }

            $qty = (int) $request->qty;
            if (count($serial_no_list) !== $qty) {
                $errors['qty'] = "The quantity ($qty) must match the number of serial numbers (" .count($serial_no_list) . ").";
            }
            
            if (!empty($errors)) {
                return back()->withErrors($errors)->withInput();
            }
            
            foreach ($serialNumbers as $item) {
                $serial_no_list[] = trim($item);
            }
        }
        foreach ($serial_no_list as $item) {
            // dd($item);
            $existingRecord = TblStock::where('invoice_no', $invoice_no)
                ->where('cid', $request->cid)
                ->where('scid', $request->scid)
                ->where('serial_no', $item)
                ->first();
               
            if ($existingRecord == null) {
                // dd("if");
                TblStock::create([
                    'date' => $inwards['date'],
                    'invoice_no' => $invoice_no,
                    'cid' => $request->cid,
                    'scid' => $request->scid,
                    'serial_no' => $item,
                    'qty' => $item === 0 ? $request->qty : 1, // Updated condition
                    'price' => $request->price,
                    'priceofUnit' => $price,
                    'status' => 0,
                ]);
            } 
        }
        // return redirect()->route('report.stock');
        return back()->with('success', 'Stock Added successfully!');

    }

    public function check_stock(Request $request)
    {
        $subcategory_id = $request->subcategory_id;

        if ($subcategory_id) {
            $sr_no = tbl_sub_category::where('id', $subcategory_id)->value('sr_no');
            $query = TblStock::where('scid', $subcategory_id);
            if ($sr_no == 1) {
                $query->where('status', '0');
            }
            $data = $query->get();
            return response()->json(['data' => $data]);
        }
        return response()->json(['error' => 'Subcategory ID not provided'], 400);
    }

    public function sr_no(Request $request){
        $query = TblStock::with('subCategory','category','purchase');
        
        if ($request->filled('invoice_no')) {
            $query->where('invoice_no', $request->invoice_no);
        }
        $serial_no_list = $query->get()
                          ->groupBy('invoice_no')
                          ->reject(fn($group, $invoiceNo) => empty($invoiceNo));
        return view('show_srno',compact('serial_no_list'));
    }

    public function update(Request $request){
        $id = $request->id;
        $existingRecord = TblStock::find($id);

        if($existingRecord){
            $existingRecord->update([
                'dead_status' => $request->status,
            ]);

            return response()->json(['message' => 'Record updated successfully']);
        }
    }
    
    public function datainsert()
    {
        $serialNos = [
    'CY2210001',
    'C22301037',
    'M24210062',
    'C02203092',
];


// Loop and insert
foreach ($serialNos as $serial) {
    Report::create([
        'indate'       => '2025-09-19', // keep in Y-m-d format for DB safety
        'worker_name'  => 'Test Worker',
        'body'         => '1',
        'part'        =>  "0",
        'china'        => "1",
        'opening'      => 1,
        'sr_no_fiber'  => $serial, // loop value
        'm_j'          => null,
        'type'         => 1,
        'section'      => 0,
        'note1'        => 'No Data Available, This is an Opening Fiber',
        'note2'        => null,
        'remark'       => null,
        'status'       => 1, // verify 
        'temp'         => null,
        'r_status'     => 0, 
        'f_status'     => 1,
        'party_name'   => null,
        'sale_status'  => 0,
        'stock_status' => 1,
        'final_amount' => 0,
        'extra_line'   => null,
        'outdate'      => null,
    ]);
}
           return redirect()->route('report.index')->with('success', 'Test data inserted successfully!');

    }

}
