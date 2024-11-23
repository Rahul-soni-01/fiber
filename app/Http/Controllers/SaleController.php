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
use Illuminate\Support\Facades\Validator;



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

    public function return(Request $request){
        if ($this->checkPermission($request, 'view')) {
            $sales = Sale::with('customer')->get();

            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $serial_nos = Report::where('status','1') ->where('sale_status', null)
                          ->where('part','0')->get()->sortBy('sr_no_fiber');
            
            return view('sale.return', compact('sales','customers', 'inwards', 'items','serial_nos'));
            // return view('sale.return', compact('sales'));
        }
        return redirect('/unauthorized');
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $customers = TblCustomer::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $serial_nos = Report::where('status','1') ->where('sale_status', null)
                          ->where('part','0')->get()->sortBy('sr_no_fiber');
            
            return view('sale.create', compact('customers', 'inwards', 'items','serial_nos'));
        }
        return redirect('/unauthorized');

    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'invoice_no' => 'required|unique:tbl_sales,sale_id',
            'total_amount' => 'required|numeric',
            'date' => 'required|date',
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
    
            $sale = Sale::with(['items', 'customer','items.report'])->findOrFail($id);
            // dd($sale);
            return view('sale.show', compact('sale'));
        }
        return redirect('/unauthorized');
    }

    public function edit(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
    
            $sale = Sale::with(['items', 'customer','items.report'])->findOrFail($id);
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
            return view('sale.edit', compact('sale','customers', 'inwards', 'items','serial_nos'));
        }
        return redirect('/unauthorized');
    }

}
