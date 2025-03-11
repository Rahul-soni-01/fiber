<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\PartyModel;
use App\Models\InwardModel;
use App\Models\CategoryModel;

class UserController extends Controller
{
//
    function users(){
        $users = DB::select('select * from tbl_parties');
        return view('show_party',['users' => $users]);
    }

//
    function category()
    {
        $categories = CategoryModel::all();
        return view('add_category', compact('categories'));
    }
//
    function search(Request $request){
        $PartyData = PartyModel::where('party_name','like',"%$request->party_name%")
        ->where('address','like',"%$request->address%")
        ->where('telephone_no','like',"%$request->telephone_no%")
        ->where('contact_person_name','like',"%$request->cont_name%")
        ->get();
        // return view('show_party',['users' => $PartyData]);
        return $PartyData;
    }
    
    function view(Request $request){
        $inward = InwardModel::where('invoice_no','like',"%$request->invoice_number%")
        ->where('pid','like',"%$request->p_name%")
        ->where('amount','like',"%$request->amount%")
        ->where('inr_amount','like',"%$request->amount_inr%")
        ->get();
        return view('show_inward',['inwards' => $inward]);
    }
//
    function inward(){
        $inwards = DB::select('select p.date,p.invoice_no,pa.party_name,p.amount,p.inr_rate,p.inr_amount,p.shipping_cost from `tbl_purchase` as p
        JOIN tbl_party as pa on p.pid = pa.id ORDER BY p.id ASC');
        return view('show_inward',['inwards' => $inwards]);
    }
//
    function show_category(){
        $categories = DB::select('select sc.id,c.created_at as category_date,c.category_name,sc.created_at as sub_category_date,sc.sub_category_name,sc.unit,sc.sr_no from `tbl_sub_category` as sc
        JOIN tbl_category as c on sc.cid = c.id');
        return view('show_category',['categories' => $categories]);
    }
}
