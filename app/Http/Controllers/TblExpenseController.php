<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblExpense;
use App\Models\TblBank;

class TblExpenseController extends Controller
{
    public function index()
    {
        $expenses = TblExpense::all();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        $banks = TblBank::all();
        return view('expenses.create',compact('banks'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'name' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'payment_type' => 'nullable|in:Cash,Bank',
            'bank_id' => 'nullable|integer',
            'transaction_type' => 'nullable|string|max:255',
            'cheque_no' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);
        
        $data = $request->only(['date','name', 'amount', 'payment_type', 'notes']); // Always include these fields
        
        // Only add these fields if payment_type is 'Bank'
        if ($request->payment_type == 'Bank') {
            $data['bank_id'] = $request->bank_id;
            $data['transaction_type'] = $request->transaction_type;
            $data['cheque_no'] = $request->cheque_no;
        }
        
        TblExpense::create($data);
        


        return redirect()->route('expenses.index')->with('success', 'Expense created successfully.');
    }
    public function show($id)
    {
        $expense = TblExpense::findOrFail($id);
        return view('expenses.show', compact('expense'));
    }
    public function edit($id)
    {
        $expense = TblExpense::findOrFail($id);
        $banks = TblBank::all();
        return view('expenses.edit', compact('expense','banks'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'payment_type' => 'nullable|in:Cash,Bank',
            'bank_id' => 'nullable|integer',
            'transaction_type' => 'nullable|string|max:255',
            'cheque_no' => 'nullable|string|max:255',
            'notes' => 'nullable|string|max:255',
        ]);
        
        $expense = TblExpense::findOrFail($id);
        
        $data = $request->only(['name', 'amount', 'payment_type', 'notes']); // Always include these fields
        
        if ($request->payment_type == 'Bank') {
            $data['bank_id'] = $request->bank_id;
            $data['transaction_type'] = $request->transaction_type;
            $data['cheque_no'] = $request->cheque_no;
        } else {
            $data['bank_id'] = null;
            $data['transaction_type'] = null;
            $data['cheque_no'] = null;
        }
        
        $expense->update($data);

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $expense = TblExpense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
