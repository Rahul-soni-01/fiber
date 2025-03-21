<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblStock;
use App\Models\tbl_sub_category;
use App\Models\tbl_category;
use App\Models\tbl_purchase;
use App\Models\tbl_purchase_item;
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
            'serial_no.*' => ['nullable', 'regex:/^[A-Za-z]{6}\d{4}$/'],
        ], [
            'serial_no.*.regex' => 'Each serial number must be 6 alphabetic characters followed by 4 numeric characters.',
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
                if (!preg_match('/^[A-Za-z]{6}\d{4}$/', $serial)) {
                    $errors['sr_no'] = 'Each serial number must have exactly 6 letters followed by 4 digits (e.g., ABCDEF1234).';
                    break;
                }
            
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
        return redirect()->route('report.stock');

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

    public function datainsert()
    {

        $invoice_no = 103;
        $price = 1000;
        $cid = 14;  // 1,1,1
        $scid = 27; // 1,2,3

        for ($i = -1; $i <= 101; $i++) {
            if ($i === 99) {
                return redirect()->route('home');
            }

            TblStock::create([
                'date' => now()->format('Y-m-d'),
                'invoice_no' => $invoice_no,
                'cid' => $cid,
                'scid' => $scid,
                'serial_no' => 3001 + $i,
                'qty' => 1,
                'price' => $price,
                'priceofUnit' => $price / 100,
                'status' => 0,
                'dead_status' => 0,
            ]);
        }

    }

}
