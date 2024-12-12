<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerPayment;
use App\Models\TblPayment;
use App\Models\tbl_party;
use App\Models\TblCustomer;
use App\Models\Sale;
use App\Models\tbl_purchase;

class PaymentController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Department ?? [];
        return in_array($action, $permissions);
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $customers = TblCustomer::all();
            $suppliers = tbl_party::all();
            $selles = Sale::all();
            $tbl_purchases = tbl_purchase::all();

            return view('payment.create',compact('customers','suppliers','selles','tbl_purchases'));
        }
        return redirect('/unauthorized');

    }
    public function store(Request $request)
    {
        if(!empty($request->sid)){
            $request->validate([
                'date' => 'required|date',
                'sid' => 'required|integer',
                'invoice_no' => 'required|array',
                'invoice_no.*' => 'integer', // Each sale ID should be an integer
                'paid_total' => 'required|numeric|min:0',
                'payment_method' => 'required|string|in:Cash,Bank',
                'transaction_type' => 'nullable|string|in:RTGS,NEFT', // Only for Bank
                'bank_name' => 'nullable|string|max:255',
                'holder_name' => 'nullable|string|max:255',
                'branch_name' => 'nullable|string|max:255',
                'account_number' => 'nullable|string|max:255',
                'account_type' => 'nullable|string|in:HSS,CD,CC,OD',
                'ifsc_code' => 'nullable|string|max:255',
            ]);

            $paymentData = [
                'payment_date' => $request->date,
                'supplier_id' => $request->cid, // Assuming 'cid' refers to customer_id
                'purchase_id' => json_encode($request->sale_id), // Store as JSON array
                'amount_paid' => $request->paid_total,
                'payment_method' => $request->payment_method,
                'notes' => $request->note ?? null,
                'transaction_type' => $request->payment_method === 'Bank' ? $request->transaction_type : null,
                'bank_name' => $request->payment_method === 'Bank' ? $request->bank_name : null,
                'account_holder_name' => $request->payment_method === 'Bank' ? $request->holder_name : null,
                'branch_name' => $request->payment_method === 'Bank' ? $request->branch_name : null,
                'account_number' => $request->payment_method === 'Bank' ? $request->account_number : null,
                'account_type' => $request->payment_method === 'Bank' ? $request->account_type : null,
                'ifsc_code' => $request->payment_method === 'Bank' ? $request->ifsc_code : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            TblPayment::create($paymentData); // Replace Payment with your model
        }
        elseif(!empty($request->cid)){
            $request->validate([
                'date' => 'required|date',
                'cid' => 'required|integer',
                'sale_id' => 'required|array',
                'sale_id.*' => 'integer', // Each sale ID should be an integer
                'paid_total' => 'required|numeric|min:0',
                'payment_method' => 'required|string|in:Cash,Bank',
                'transaction_type' => 'nullable|string|in:RTGS,NEFT', // Only for Bank
                'bank_name' => 'nullable|string|max:255',
                'holder_name' => 'nullable|string|max:255',
                'branch_name' => 'nullable|string|max:255',
                'account_number' => 'nullable|string|max:255',
                'account_type' => 'nullable|string|in:HSS,CD,CC,OD',
                'ifsc_code' => 'nullable|string|max:255',
            ]);

            $paymentData = [
                'payment_date' => $request->date,
                'supplier_id' => $request->cid, // Assuming 'cid' refers to customer_id
                'purchase_id' => json_encode($request->sale_id), // Store as JSON array
                'amount_paid' => $request->paid_total,
                'payment_method' => $request->payment_method,
                'notes' => $request->note ?? null,
                'transaction_type' => $request->payment_method === 'Bank' ? $request->transaction_type : null,
                'bank_name' => $request->payment_method === 'Bank' ? $request->bank_name : null,
                'account_holder_name' => $request->payment_method === 'Bank' ? $request->holder_name : null,
                'branch_name' => $request->payment_method === 'Bank' ? $request->branch_name : null,
                'account_number' => $request->payment_method === 'Bank' ? $request->account_number : null,
                'account_type' => $request->payment_method === 'Bank' ? $request->account_type : null,
                'ifsc_code' => $request->payment_method === 'Bank' ? $request->ifsc_code : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
    
            TblPayment::create($paymentData); // Replace Payment with your model
        }
    
        return redirect()->route('payment.index')->with('success', 'Payment created successfully');
    }
    public function index(){

        return view('payment.index', compact('paymentes', 'supplier', 'items'));
    }
}
