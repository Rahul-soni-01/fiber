<?php

namespace App\Http\Controllers;

use App\Models\tbl_purchase;
use Illuminate\Http\Request;
use App\Models\tbl_party;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use App\Models\tbl_purchase_item;
use App\Models\TblStock;

class TblPurchaseController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Inward ?? [];
        return in_array($action, $permissions);
    }
    public function index(tbl_purchase $tbl_purchase, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $inwards = tbl_purchase::with('party')
                ->select('date', 'invoice_no', 'amount', 'inr_rate', 'inr_amount', 'shipping_cost', 'pid')
                ->orderBy('id', 'asc')
                ->get()
                ->map(function ($purchase) {
                    return [
                        'date' => $purchase->date,
                        'invoice_no' => $purchase->invoice_no,
                        'party_name' => $purchase->party->party_name,
                        'amount' => $purchase->amount,
                        'inr_rate' => $purchase->inr_rate,
                        'inr_amount' => $purchase->inr_amount,
                        'shipping_cost' => $purchase->shipping_cost,
                    ];
                });

            $SubCategories = tbl_sub_category::all();
            $Categories = tbl_category::all();
            $tbl_parties = tbl_party::all();

            return view('show_inward', ['inwards' => $inwards, 'Categories' => $Categories, 'tbl_parties' => $tbl_parties, 'SubCategories' => $SubCategories]);
        }
        return redirect('/unauthorized');

    }

    public function filter(Request $request)
    {
        // Retrieve form inputs
        $s_date = $request->get('s_date');
        $e_date = $request->get('e_date');
        $invoice_number = $request->get('invoice_number');
        $p_name = $request->get('p_name');
        $amount = $request->get('amount');
        $amount_inr = $request->get('amount_inr');

        // Query with filters
        $inwards = tbl_purchase::with('party')
            ->select('date', 'invoice_no', 'amount', 'inr_rate', 'inr_amount', 'shipping_cost', 'pid')
            ->when($s_date, function ($query, $s_date) {
                return $query->where('date', '>=', $s_date);
            })
            ->when($e_date, function ($query, $e_date) {
                return $query->where('date', '<=', $e_date);
            })
            ->when($invoice_number, function ($query, $invoice_number) {
                return $query->where('invoice_no', 'LIKE', '%' . $invoice_number . '%');
            })
            ->when($p_name, function ($query, $p_name) {
                return $query->whereHas('party', function ($q) use ($p_name) {
                    $q->where('pid', 'LIKE', '%' . $p_name . '%');
                });
            })
            ->when($amount, function ($query, $amount) {
                return $query->where('amount', $amount);
            })
            ->when($amount_inr, function ($query, $amount_inr) {
                return $query->where('inr_amount', $amount_inr);
            })
            ->orderBy('id', 'asc')
            ->get()
            ->map(function ($purchase) {
                return [
                    'date' => $purchase->date,
                    'invoice_no' => $purchase->invoice_no,
                    'party_name' => $purchase->party->party_name,
                    'amount' => $purchase->amount,
                    'inr_rate' => $purchase->inr_rate,
                    'inr_amount' => $purchase->inr_amount,
                    'shipping_cost' => $purchase->shipping_cost,
                ];
            });

        $SubCategories = tbl_sub_category::all();
        $Categories = tbl_category::all();
        $tbl_parties = tbl_party::all();
        // dd($tbl_parties);
        return view('show_inward', ['inwards' => $inwards, 'Categories' => $Categories, 'tbl_parties' => $tbl_parties, 'SubCategories' => $SubCategories]);
    }


    public function one_purchase(tbl_purchase $tbl_purchase, $invoice_no)
    {
        $inwards = tbl_purchase::with('party')
            ->where('invoice_no', $invoice_no)
            ->orderBy('id', 'asc')
            ->get();
        $SubCategories = tbl_sub_category::all();
        $Categories = tbl_category::all();
        $tbl_parties = tbl_party::all();

        return view('show_srno', compact('inwards'));
        // return view('show_srno', data: ['inwards'=>$inwards,'Categories'=>$Categories,'tbl_parties'=>$tbl_parties,'SubCategories'=>$SubCategories]);

    }

    public function add_sr_no(Request $request)
    {
        $invoice_no = $request->query('invoice_no');
        $req_category = $request->query('category');
        $req_subcategory = $request->query('subcategory');
        $req_qty = $request->query('qty');
        $req_price = $request->query('price');
        $req_unit = $request->query('unit');
        $query = tbl_purchase::with('party')->orderBy('id', 'asc');
        if ($invoice_no) {
            $query->where('invoice_no', $invoice_no);
        }

        $inwards = $query->get();
        // dd($inwards);
        $SubCategories = tbl_sub_category::all();
        $Categories = tbl_category::all();
        $tbl_parties = tbl_party::all();
        if ($invoice_no) {
            $inwardsItems = tbl_purchase_item::with(['category', 'subCategory'])
                ->where('invoice_no', $invoice_no)
                ->where('cid', $req_category)
                ->where('scid', $req_subcategory)
                ->get();
            foreach ($inwardsItems as $item) {
                $sr_no = $item->subCategory->sr_no;
            }

            $existingrecord = TblStock::where('invoice_no', $invoice_no)
                ->where('cid', $req_category)
                ->where('scid', $req_subcategory)
                ->count();

            // dd($existingrecord);
            return view('add_srno', compact('inwards', 'tbl_parties', 'Categories', 'SubCategories', 'invoice_no', 'req_category', 'req_subcategory', 'req_qty', 'req_price', 'req_unit', 'sr_no', 'existingrecord'));
        }
        return view('add_srno', compact('inwards', 'tbl_parties', 'Categories', 'SubCategories'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tbl_purchase $tbl_purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_purchase $tbl_purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_purchase $tbl_purchase)
    {
        //
    }
}
