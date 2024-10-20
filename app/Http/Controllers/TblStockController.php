<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblStock;
use App\Models\tbl_sub_category;
use App\Models\tbl_category;
use App\Models\tbl_purchase;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class TblStockController extends Controller
{
    public function store(Request $request){
        if ($request->unit === 'Pic') {
            $validator = Validator::make($request->all(), [
                'cid' => 'required',
                'scid' => 'required',
                'serial_no' => 'required|unique:tbl_stock',
                'qty' => 'required|integer',
                'price' => 'required|numeric',
            ]);
        } elseif ($request->unit === 'Mtr') {
            $validator = Validator::make($request->all(), [
                'cid' => 'required',
                'scid' => 'required',
                'qty' => 'required|integer',
                'price' => 'required|numeric',
            ]);
        }
        $invoice_no = $request->invoice_no;
        $inwards = tbl_purchase::with('party')
        ->where('invoice_no', $invoice_no) 
        ->first();
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            $validatedData = $validator->validated();
        }

        $price = $request->price / $request->qty;
        if($request->unit === 'Pic' ){
            foreach ($request->serial_no as $item) {
                $existingRecord = TblStock::where('invoice_no', $invoice_no)
                ->where('cid', $request->cid)
                ->where('scid', $request->scid)
                ->where('serial_no', $item)
                ->first();
    
            if (!$existingRecord) {
                TblStock::create([
                    'date' => $inwards['date'],
                    'invoice_no' => $invoice_no,
                    'cid' => $request->cid,
                    'scid' => $request->scid,
                    'serial_no' => $item,
                    'qty' => 1,
                    'price' => $request->price,
                    'priceofUnit' => $price,
                ]);
            }else{
                return redirect()->back()->withErrors("Invoice No or Serial No already exists")->withInput();
            }
        }
        }elseif($request->unit === 'Mtr'){

            $existingRecord = TblStock::where('invoice_no', $invoice_no)
                ->where('cid', $request->cid)
                ->where('scid', $request->scid)
                ->first();

            if (!$existingRecord) {
                TblStock::create([
                    'date' => $inwards['date'],
                    'invoice_no' => $invoice_no,
                    'cid' => $request->cid,
                    'scid' => $request->scid,
                    'serial_no' => '0', // Serial number set to '1'
                    'qty' => $request->qty,
                    'price' => $request->price,
                    'priceofUnit' => $price,
                ]);
            }else{
                return redirect()->back()->withErrors("Invoice No or Serial No already exists")->withInput();
            }
        }
       
        return redirect()->route('inward.index')->with('success', 'Stock added successfully');

    }

    public function check_stock(Request $request){
        $subcategory_id = $request->subcategory_id;
        $data = TblStock::where('scid', $subcategory_id)->get();
        return response()->json(['data' => $data]);

    }
}
