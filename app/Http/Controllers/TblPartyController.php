<?php

namespace App\Http\Controllers;

use App\Models\tbl_party;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use Illuminate\Http\Request;

class TblPartyController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Party ?? [];
        return in_array($action, $permissions);
    }
    public function view(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {

            $partyname = tbl_party::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            return view('good_inward', compact('partyname', 'inwards', 'items'));
        }
        return redirect('/unauthorized');

    }

    public function search(Request $request)
    {
        $PartyData = tbl_party::where('party_name', 'like', "%$request->party_name%")
            ->where('address', 'like', "%$request->address%")
            ->where('telephone_no', 'like', "%$request->telephone_no%")
            ->where('sender_name', 'like', "%$request->cont_name%")
            ->get();
        return view('show_party', ['users' => $PartyData]);
        // return $PartyData;
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            return view('party.create');
        }
        return redirect('/unauthorized');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        $request->validate([
            'party_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tele_no' => 'required|numeric',
            'contact_person_name' => 'required|string|max:255',
        ]);
    
        // Create new tbl_party instance
        $party = new tbl_party();
        $party->party_name = $request->party_name;
        $party->address = $request->address;
        $party->telephone_no = $request->tele_no;
        $party->sender_name = $request->contact_person_name;
    
        $result = $party->save();
    
        // Redirect based on the result
        if ($result) {
            return redirect()->route('party.show')->with('success', 'Party added successfully.');
        } else {
            return redirect()->route()->back()->with('error', 'Failed to add party.');
        }
    }
    public function index(tbl_party $tbl_party, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $parties = tbl_party::all();
            return view('party.index', ['parties' => $parties]);
        }
        return redirect('/unauthorized');

    }

    
    public function edit(tbl_party $tbl_party,$id,Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {

            $party = tbl_party::findOrFail($id);
                return view('party.edit', compact('party'));
            }
        return redirect('/unauthorized');
    }

   
    public function update(Request $request, tbl_party $tbl_party, $id)
    {
        $request->validate([
            'party_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'tele_no' => 'required|numeric',
            'contact_person_name' => 'required|string|max:255',
        ]);
    
        $party = tbl_party::findOrFail($id); 
        $party->party_name = $request->party_name;
        $party->address = $request->address;
        $party->telephone_no = $request->tele_no;
        $party->sender_name = $request->contact_person_name;
    
        $result = $party->save();
    
        if ($result) {
            return redirect()->route('party.show')->with('success', 'Party updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update party.');
        }
        
    }

    public function destroy(tbl_party $tbl_party,$id, Request $request)
    {
        if ($this->checkPermission($request, 'delete')) {
            $party = $tbl_party->find($id);
            $party->delete();
            return redirect()->route('party.show')->with('success', 'Party Deleted Successfully.');
        }
        return redirect('/unauthorized');

    }
}
