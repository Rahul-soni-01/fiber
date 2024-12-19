<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblExpense;

class TblExpenseController extends Controller
{
    public function index()
    {
        $expenses = TblExpense::all();
        return view('expenses.index', compact('expenses'));
    }

    public function create()
    {
        return view('expenses.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'payment_type' => 'nullable|in:Cash,Bank',
            'bank_id' => 'nullable|integer',
        ]);

        TblExpense::create($request->all());

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
        return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'amount' => 'nullable|numeric',
            'payment_type' => 'nullable|in:Cash,Bank',
            'bank_id' => 'nullable|integer',
        ]);

        $expense = TblExpense::findOrFail($id);
        $expense->update($request->all());

        return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy($id)
    {
        $expense = TblExpense::findOrFail($id);
        $expense->delete();

        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully.');
    }
}
