<?php

namespace App\Http\Controllers;

use App\Models\tbl_purchase;
use Illuminate\Http\Request;
use App\Models\tbl_party;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use App\Models\tbl_purchase_item;
use App\Models\TblStock;
use App\Models\TblPurchaseReturn;
use App\Models\TblPurchaseReturnItem;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

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

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {

            $partyname = tbl_party::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            return view('good_inward', compact('partyname', 'inwards', 'items'));
        }
        return redirect('/unauthorized');
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
            $getsr_nos = TblStock::where('invoice_no', $invoice_no)
                ->where('cid', $req_category)
                ->where('scid', $req_subcategory)
                ->get();

            // dd($existingrecord);
            return view('add_srno', compact('inwards', 'tbl_parties', 'Categories', 'SubCategories', 'invoice_no', 'req_category', 'req_subcategory', 'req_qty', 'req_price', 'req_unit', 'sr_no', 'existingrecord', 'getsr_nos'));
        }
        return view('add_srno', compact('inwards', 'tbl_parties', 'Categories', 'SubCategories'));
    }

    public function ReturnIndex(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $SubCategories = tbl_sub_category::all();
            $Categories = tbl_category::all();
            $tbl_parties = tbl_party::all();
            $PurchaseReturns = TblPurchaseReturn::with('purchaseReturnDetails', 'party', 'purchaseReturnDetails.category', 'purchaseReturnDetails.subCategory')->get();
            // make a query to get all purchase return details

            // dd($PurchaseReturns);
            return view('inward.return', ['PurchaseReturns' => $PurchaseReturns, 'Categories' => $Categories, 'tbl_parties' => $tbl_parties, 'SubCategories' => $SubCategories]);
        }
        return redirect('/unauthorized');
    }


    public function Return_show_id(Request $request, $id)
    {
        if ($this->checkPermission($request, 'view')) {
            $SubCategories = tbl_sub_category::all();
            $Categories = tbl_category::all();
            $tbl_parties = tbl_party::all();
            $PurchaseReturn = TblPurchaseReturn::with('purchaseReturnDetails', 'party', 'purchaseReturnDetails.category', 'purchaseReturnDetails.subCategory')
                ->findOrFail($id);
            // make a query to get all purchase return details

            // dd($PurchaseReturn);
            return view('inward.return-show', ['PurchaseReturn' => $PurchaseReturn, 'Categories' => $Categories, 'tbl_parties' => $tbl_parties, 'SubCategories' => $SubCategories,'id'=> $id]);
        }
        
        return redirect('/unauthorized');
    }

    public function Return_Create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $purchaseReturn = TblPurchaseReturn::all();
            $SubCategories = tbl_sub_category::all();
            $Categories = tbl_category::all();
            $tbl_parties = tbl_party::all();

            return view('inward.returnCreate', ['purchaseReturn' => $purchaseReturn, 'Categories' => $Categories, 'tbl_parties' => $tbl_parties, 'SubCategories' => $SubCategories]);
        }
        return redirect('/unauthorized');
    }
    public function Return_Store(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $validator = Validator::make($request->all(), [
                'invoice_no' => 'required|integer|exists:tbl_purchases,invoice_no',
                'pid' => 'required|integer|exists:tbl_parties,id',
                'purchaseitems' => [
                    'required',
                    'array',
                    'min:1',
                    function ($attribute, $value, $fail) {
                        if (count($value) !== count(array_unique($value))) {
                            $fail('The ' . $attribute . ' field contains duplicate items.');
                        }
                    }
                ],
                'purchaseitems.*' => 'required|integer|exists:tbl_purchase_items,id',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            } else {
                $existingPurchaseReturn = TblPurchaseReturn::where('invoice_no', $request->invoice_no)
                    ->where('p_id', $request->pid)
                    ->first();

                if (!$existingPurchaseReturn) {
                    // Create a new TblPurchaseReturn if it does not exist
                    $purchaseReturn = new TblPurchaseReturn();
                    $purchaseReturn->invoice_no = $request->invoice_no;
                    $purchaseReturn->p_id = $request->pid;
                    // Make today's date
                    $purchaseReturn->date = date('Y-m-d');
                    $purchaseReturn->save();
                }
             
                try {
                    $count = count($request->purchaseitems);
                    
                    for ($i = 0; $i < $count; $i++) {
                        $purchase_item_id = $request->purchaseitems[$i];
                        $purchase_item = tbl_purchase_item::findOrFail($purchase_item_id);
                        // If purchase item is found
                        if ($purchase_item) {
                           
                            $cid = $purchase_item->cid;
                            $scid = $purchase_item->scid;
                            $unit = $purchase_item->unit;
                            $price = $purchase_item->price;
                            $purchaseqty = $purchase_item->qty;

                            // Check total returned quantity for this product
                            $totalReturnedQty = TblPurchaseReturnItem::where('invoice_no', $request->invoice_no)
                                ->where('cid', $purchase_item->cid)
                                ->where('scid', $purchase_item->scid)
                                ->sum('qty');

                                // dd($purchaseqty,$totalReturnedQty,$totalReturnedQty + $request->qty[$i]);
                            // Ensure that returned quantity does not exceed purchased quantity
                            if (($totalReturnedQty + $request->qty[$i]) <= $purchaseqty) {
                                // Insert the purchase return item
                                TblPurchaseReturnItem::create([
                                    'invoice_no' => $request->invoice_no,
                                    'cid' => $cid,
                                    'scid' => $scid,// Add product_id
                                    'qty' => $request->qty[$i],
                                    'reason' => $request->reason[$i],
                                    'unit' => $unit,
                                    'price' => $price,
                                ]);
                            } else {
                                // If return quantity exceeds purchase quantity, show error
                                return redirect()->back()->withErrors([
                                    'qty' => 'The returned quantity for product ' . $purchase_item->scid . ' exceeds the purchased quantity.',
                                ]);
                            }
                        } else {
                            // If the purchase item is not found
                            return redirect()->back()->withErrors([
                                'item' => 'Purchase item not found for ID ' . $purchase_item_id,
                            ]);
                        }
                    }

                    return redirect()->route('inward.return.index')->with('success', 'Purchase Return successfully created.');

                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Failed to insert Purchase Return: ' . $e->getMessage());
                }


                return redirect()->route('inward.return.index')->with('success', 'Purchase Return successfully.');
            }
        }
        return redirect('/unauthorized');
    }

    public function paymentindex(Request $request)
    {
        $inwards = tbl_purchase::with('party')->get();
        dd($inwards);
    }
}
