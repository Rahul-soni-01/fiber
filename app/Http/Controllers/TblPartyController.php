<?php

namespace App\Http\Controllers;

use App\Models\tbl_party;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use Illuminate\Http\Request;

class TblPartyController extends Controller
{
    public function view()
    {
        $partyname = tbl_party::all();
        $inwards = tbl_category::all();
        $items = tbl_sub_category::all();
        return view('good_inward', compact('partyname', 'inwards', 'items'));
    }

    public function search(Request $request){
        $PartyData = tbl_party::where('party_name','like',"%$request->party_name%")
        ->where('address','like',"%$request->address%")
        ->where('telephone_no','like',"%$request->telephone_no%")
        ->where('sender_name','like',"%$request->cont_name%")
        ->get();
        return view('show_party',['users' => $PartyData]);
        // return $PartyData;
    }
    public function index()
    {
        return view('add_party');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $party = new tbl_party();
        $party->party_name = $request->party_name;
        $party->address = $request->address;
        $party->telephone_no = $request->tele_no;
        $party->sender_name = $request->contact_person_name;

        $result = $party->save();

        if ($result) {
            return redirect('party');

        } else {
            return redirect('addparty');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_party $tbl_party)
    {
        $users = tbl_party::all();
        return view('show_party',['users' => $users]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tbl_party $tbl_party)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_party $tbl_party)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_party $tbl_party)
    {
        //
    }
}
