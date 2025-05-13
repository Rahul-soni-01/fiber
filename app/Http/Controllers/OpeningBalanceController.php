<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OpeningBalance;


class OpeningBalanceController extends Controller
{
      public function index()
    {
        $balances = OpeningBalance::all();
        return view('opening_balances.index', compact('balances'));
    }

    /**
     * Show the form for creating a new opening balance.
     */
    public function create()
    {
        return view('opening_balances.create');
    }

    /**
     * Store a newly created opening balance in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'balance_date' => 'required|date|unique:tbl_opening_balances,balance_date',
            'cash_on_hand' => 'nullable|numeric',
            'petty_cash' => 'nullable|numeric',
            'bank' => 'nullable|numeric',
            'investment_accounts' => 'nullable|numeric',
            'trade_receivables' => 'nullable|numeric',
            'loans_receivable' => 'nullable|numeric',
            'allowance_doubtful' => 'nullable|numeric',
            'raw_materials' => 'nullable|numeric',
            'work_in_progress' => 'nullable|numeric',
            'finished_goods' => 'nullable|numeric',
            'trade_payables' => 'nullable|numeric',
            'short_term_loans' => 'nullable|numeric',
            'long_term_loans' => 'nullable|numeric',
            'tax_payable' => 'nullable|numeric',
            'share_capital' => 'nullable|numeric',
            'retained_earnings' => 'nullable|numeric',
            'current_profit' => 'nullable|numeric',
            'capital' => 'nullable|numeric',
        ]);

        OpeningBalance::create($validated);

        return redirect()->route('openingbalance.index')->with('success', 'Opening balance saved successfully.');
    }

    /**
     * Show the form for editing the specified opening balance.
     */
    public function edit(OpeningBalance $openingBalance)
    {
        return view('opening_balances.edit', compact('openingBalance'));
    }

    /**
     * Update the specified opening balance in storage.
     */
    public function update(Request $request, OpeningBalance $openingBalance)
    {
        $validated = $request->validate([
            'balance_date' => 'required|date|unique:tbl_opening_balances,balance_date,' . $openingBalance->id,
            'cash_on_hand' => 'nullable|numeric',
            'petty_cash' => 'nullable|numeric',
            'bank' => 'nullable|numeric',
            'investment_accounts' => 'nullable|numeric',
            'trade_receivables' => 'nullable|numeric',
            'loans_receivable' => 'nullable|numeric',
            'allowance_doubtful' => 'nullable|numeric',
            'raw_materials' => 'nullable|numeric',
            'work_in_progress' => 'nullable|numeric',
            'finished_goods' => 'nullable|numeric',
            'trade_payables' => 'nullable|numeric',
            'short_term_loans' => 'nullable|numeric',
            'long_term_loans' => 'nullable|numeric',
            'tax_payable' => 'nullable|numeric',
            'share_capital' => 'nullable|numeric',
            'retained_earnings' => 'nullable|numeric',
            'current_profit' => 'nullable|numeric',
            'capital' => 'nullable|numeric',
        ]);

        $openingBalance->update($validated);

        return redirect()->route('openingbalance.index')->with('success', 'Opening balance updated successfully.');
    }

    /**
     * Remove the specified opening balance from storage.
     */
    public function destroy(OpeningBalance $openingBalance)
    {
        $openingBalance->delete();

        return redirect()->route('openingbalance.index')->with('success', 'Opening balance deleted successfully.');
    }
}
