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
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cid' => 'required',
            'scid' => 'required',
            'qty' => 'required|integer',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $invoice_no = $request->invoice_no;
        $inwards = tbl_purchase::with('party')
            ->where('invoice_no', $invoice_no)
            ->first();


        $price = $request->price / $request->qty;
        $serial_no_list = $request->serial_no ?? ['0'];
        foreach ($serial_no_list as $item) {
            
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
                    'qty' => $item === 0 ? 1 : $request->qty,
                    'price' => $request->price,
                    'priceofUnit' => $price,
                    'status' => 0,
                ]);
            } else {
                return redirect()->back()->withErrors("Invoice No or Serial No already exists")->withInput();
            }
        }
        return redirect()->route('report.stock');

    }

    public function check_stock(Request $request)
    {
        $subcategory_id = $request->subcategory_id;
        $data = TblStock::where('scid', $subcategory_id)->where('status', '0')->get();
        return response()->json(['data' => $data]);
    }

    public function datainsert()
    {
        
        $invoice_no = 103;
        $price = 1000;
        $cid = 1;  // 1,1,1
        $scid = 2; // 1,2,3
    
        for ($i = -1; $i <= 101; $i++) {
            if($i === 99){
                return redirect()->route('home');
            }
            
            TblStock::create([
                'date' => now()->format('Y-m-d'),
                'invoice_no' => $invoice_no,
                'cid' => $cid,
                'scid' => $scid,
                'serial_no' =>3001 + $i,
                'qty' => 1,
                'price' => $price,
                'priceofUnit' => $price/100,
                'status' => 0,
                'dead_status' => 0,
            ]);
        }
       
    }
    
}
