<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblBank;
use App\Models\CustomerPayment;
use App\Models\TblPayment;
use App\Models\TblExpense;


class TblBankController extends Controller
{

    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Party ?? [];
        return in_array($action, $permissions);
    }
    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $banks = TblBank::all(); // Fetch all banks
            return view('banks.index', compact('banks')); // Assuming a Blade template exists
        }
        return redirect('/unauthorized');
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            return view('banks.create'); // Assuming a Blade template exists
        }
        return redirect('/unauthorized');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required|string',
            'branch' => 'nullable|string',
            'account_type' => 'nullable|string|in:HSS,CD,CC,OD',
            'account_number' => 'required|string|unique:tbl_bank',
            'ifsc_code' => 'nullable|string',
            'account_holder_name' => 'required|string',
            'opening_balance' => 'required|string',
        ]);

        TblBank::create($request->all());

        return redirect()->route('banks.index')->with('success', 'Bank created successfully!');
    }
    public function edit($id, Request $request)
    {
        if ($this->checkPermission($request()->all(), 'edit')) {
            $bank = TblBank::findOrFail($id);
            return view('banks.edit', compact('bank'));
        }
        return redirect('/unauthorized');
    }

    public function show($id, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $bank = TblBank::findOrFail($id);
            $opening = $bank->opening_balance;

            $total_expenses_payments = 0;
            $expenses_payments = TblExpense::where('bank_id', $id)
                ->get()
                ->map(function ($expense) {
                    $expense->payment_date = $expense->date;
                    $expense->type = 'expense'; // Add a type identifier
                    return $expense;
                });

            foreach ($expenses_payments as $payment) {
                $total_expenses_payments += $payment->amount;
            }

            $customer_payments = CustomerPayment::with('customer')
                ->where('bank_id', $id)
                ->get()
                ->map(function ($payment) {
                    $payment->type = 'customer_payment'; // Add a type identifier
                    return $payment;
                });
            $total_customer_payment = 0;
            foreach ($customer_payments as $payment) {
                $total_customer_payment += $payment->amount_paid;
            }

            $supplier_payments = TblPayment::with('supplier')
                ->where('bank_id', $id)
                ->get()
                ->map(function ($payment) {
                    $payment->type = 'supplier_payment'; // Add a type identifier
                    return $payment;
                });
            $total_supplier_payment = 0;
            foreach ($supplier_payments as $payment) {
                $total_supplier_payment += $payment->amount_paid;
            }

            $all_payments = collect($expenses_payments)
                ->merge($customer_payments)
                ->merge($supplier_payments);

            $all_payments = $all_payments->sortBy(function ($payment) {
                return $payment->payment_date ?? $payment->date; // Sort by `payment_date`
            });
            // dd($expenses_payments, $customer_payments, $supplier_payments,$all_payments);

            return view('banks.show', compact('bank', 'customer_payments', 'supplier_payments', 'total_customer_payment', 'total_supplier_payment', 'id', 'all_payments'));
        }
        return redirect('/unauthorized');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'bank_name' => "required|string|max:191|unique:tbl_bank,bank_name,$id",
            'branch' => 'nullable|string|max:191',
            'account_type' => 'nullable|string|in:HSS,CD,CC,OD',
            'account_number' => "required|string|max:191|unique:tbl_bank,account_number,$id",
            'ifsc_code' => 'nullable|string|max:191',
            'account_holder_name' => 'required|string|max:191',
            'opening_balance' => 'required|string|max:191',
        ]);

        $bank = TblBank::findOrFail($id);
        $bank->update($request->all());

        return redirect()->route('banks.index')->with('success', 'Bank updated successfully!');
    }

    public function destroy($id, Request $request)
    {
        if ($this->checkPermission($request, 'delete')) {
            $bank = TblBank::findOrFail($id);
            $bank->delete();

            return redirect()->route('banks.index')->with('success', 'Bank deleted successfully!');
        }
        return redirect('/unauthorized');
    }
}
