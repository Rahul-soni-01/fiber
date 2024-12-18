<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblBank;


class TblBankController extends Controller
{
    public function index()
    {
        $banks = TblBank::all(); // Fetch all banks
        return view('banks.index', compact('banks')); // Assuming a Blade template exists
    }
    public function create()
    {
        return view('banks.create'); // Assuming a Blade template exists
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
    public function edit($id)
    {
        $bank = TblBank::findOrFail($id);
        return view('banks.edit', compact('bank'));
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

    public function destroy($id)
    {
        $bank = TblBank::findOrFail($id);
        $bank->delete();

        return redirect()->route('banks.index')->with('success', 'Bank deleted successfully!');
    }
}
