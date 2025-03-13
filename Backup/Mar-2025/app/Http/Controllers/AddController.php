<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PartyModel;
use App\Models\InwardModel;
use App\Models\ItemModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class AddController extends Controller
{
    function party(Request $request)
    {
        $party = new PartyModel();
        $party->party_name = $request->party_name;
        $party->address = $request->address;
        $party->telephone_no = $request->tele_no;
        $party->contact_person_name = $request->contact_person_name;

        $result = $party->save();

        if ($result) {
            return redirect('party');

        } else {
            return redirect('addparty');
        }
    }

    function category(Request $request)
    {
        $category = new CategoryModel();
        $category->category_name = $request->category_name;

        $result = $category->save();
        
        if ($result) {
            return redirect('add_category');

        } else {
            return redirect('add_category');
        }
    }

    function subcategory(Request $request)
    {
        $subcategory = new SubCategoryModel();
        $subcategory->cid = $request->category;
        $subcategory->sub_category_name = $request->sub_category;
        $subcategory->unit = $request->unit;
        $subcategory->sr_no = $request->sr_no;

        $result = $subcategory->save();
        
        if ($result) {
            return redirect('add_category');

        } else {
            return redirect('add_category');
        }
    }

    function inward(Request $request)
    {

        // For Invoice 
        $inward = new InwardModel();
        $inward->date = $request->date;
        $inward->invoice_no = $request->invoice_no;
        $inward->pid = $request->party_name;
        $inward->amount = $request->amount_d;
        $inward->inr_rate = $request->rate_r;
        $inward->inr_amount = $request->amount_r;
        $inward->shipping_cost = $request->shipping_cost;

        // For Product
        $validatedData = $request->validate([
            'invoice_no' => 'required',
            'data.*.cname' => 'required',
            'data.*.scname' => 'required',
            'data.*.unit' => 'required',
            'data.*.qty' => 'required',
            'data.*.rate' => 'required',
            'data.*.total' => 'required',
        ]);

        foreach ($validatedData['data'] as $item) {
            ItemModel::create([
                'invoice_no' => $validatedData['invoice_no'],
                'category_name' => $item['cname'],
                'sub_category_name' => $item['scname'],
                'qty' => $item['qty'],
                'unit' => $item['unit'],
                'price' => $item['rate'],
                'total' => $item['total'],
            ]);
        }
        
        $result = $inward->save();

        if ($result) {
            return redirect('inward');

        } else {
            return redirect('good_inward');
        }
    }

    function srno($invoice_no)
    {
        $item = ItemModel::where('invoice_no', $invoice_no)->get(); 

        return view('add_srno',['data'=>$item]);
    }
}
