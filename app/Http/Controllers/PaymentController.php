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

            return view('payment.create', compact('customers', 'suppliers', 'selles', 'tbl_purchases'));
        }
        return redirect('/unauthorized');

    }
    public function store(Request $request)
    {
        if (!empty($request->sid)) {
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
                'supplier_id' => $request->sid, // Assuming 'cid' refers to customer_id
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
        } elseif (!empty($request->cid)) {
            // dd($request->all());
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

            $CustomerPaymentData = [
                'payment_date' => $request->date,
                'customer_id' => $request->cid, // Assuming 'cid' refers to customer_id
                'sell_id' => json_encode($request->sale_id), // Store as JSON array
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

            CustomerPayment::create($CustomerPaymentData); // Replace Payment with your model
        } else {
            return redirect()->back()->with('error', 'Failed to created Payment.');
        }

        return redirect()->route('payment.index')->with('success', 'Payment created successfully');
    }
    public function index()
    {
        $Supplierpaymentes = TblPayment::with('supplier')->get();
       
        $supplierData = tbl_party::with('purchase','payments')
            ->get()
            ->map(function ($party) {
                return [
                    'party_id' => $party->id,
                    'party_name' => $party->party_name, // Adjust column as needed
                    'total_inr_amount' => $party->purchase->sum('inr_amount'),
                    'purchases' => $party->purchase,
                    'payments' => $party->payments,
                    'total_inr_payments' => $party->payments->sum('amount_paid'),
                    'total_remaining_payment' => $party->purchase->sum('inr_amount') - $party->payments->sum('amount_paid') ,
                    'total_payment' => $party->payments->sum('amount_paid'),
                ];
            });
        // ->groupBy('pid')
        /*$CustomerPayment = TblCustomer::with('Cuspayments','sales','SaleReturn')
        ->get()
        ->map(function ($Customer) {
            return [
                'customer_id' => $Customer->id,
                'customer_name' => $Customer->customer_name, // Adjust column as needed
                'total_inr_amount' => $Customer->sales->sum('total_amount'),
                'purchases' => $Customer->sales,
                'payments' => $Customer->Cuspayments,
                'total_inr_payments' => $Customer->Cuspayments->sum('amount_paid'),
                'total_remaining_payment' => $Customer->sales->sum('total_amount') - $Customer->Cuspayments->sum('amount_paid') ,
                'total_payment' => $Customer->payments->sum('amount_paid'),
            ];
        });*/
       
        // dd($AggregatedSupplierData, $supplierData);
        $customers = TblCustomer::all();
        $suppliers = tbl_party::all();

        return view('payment.index', compact('supplierData', 'Supplierpaymentes', 'suppliers', 'customers'));
    }

    public function CustomerIndex(){
        $CustomerPayment = TblCustomer::with('Cuspayments','sales','SaleReturn')
        ->get()
        ->map(function ($Customer) {
            return [
                'customer_id' => $Customer->id,
                'customer_name' => $Customer->customer_name, // Adjust column as needed
                'total_inr_amount' => $Customer->sales->sum('total_amount'),
                'sales' => $Customer->sales,
                'payments' => $Customer->Cuspayments,
                'total_inr_payments' => $Customer->Cuspayments->sum('amount_paid'),
                'total_remaining_payment' => $Customer->sales->sum('total_amount') - $Customer->Cuspayments->sum('amount_paid') ,
                'total_payment' => $Customer->Cuspayments->sum('amount_paid'),
            ];
        });

        return view('payment.CustomerIndex', compact('CustomerPayment'));
    }
}
