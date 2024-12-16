<?php

namespace App\Http\Controllers;

use App\Models\TblAccCoa;
use App\Models\TblAccPredefineAccount;
use Illuminate\Http\Request;

class TblAccCoaController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Account ?? [];
        return in_array($action, $permissions);
    }
    public function index()
    {
        $accounts = TblAccCoa::all();
        return view('acccoa.index', compact('accounts'));
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            $accounts = TblAccCoa::all();
            return view('acccoa.create',compact('accounts'));
        }
        return redirect('/unauthorized');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'HeadName' => 'nullable|string|max:255',
        ]);

        if(empty($request->PHeadCode)){
            $countPHeadName = TblAccCoa::where('PHeadName','COA')->count();
            $HeadCode = $countPHeadName + 10001;
            $PHeadName = "COA";
            $PHeadCode = 0;
            $HeadLevel = 1;
        }elseif(!empty($request->PHeadCode)){
            $data = TblAccCoa::where('HeadCode',$request->PHeadCode)->first();
            $HeadCode = $data->HeadLevel;
            $countHeadCode = TblAccCoa::where('HeadLevel',$HeadCode+1)->count();
            
            $thousand = match ($data->HeadLevel) {
                1 => 20001,
                2 => 30001,
                3 => 40001,
            };
            $HeadCode = $countHeadCode + $thousand;
            $PHeadName = $data->HeadName;
            $PHeadCode = $data->HeadCode;
            $HeadLevel = $data->HeadLevel+1;
        }
        // dd($HeadLevel,$HeadCode);
        $account = new TblAccCoa();
        $account->HeadCode = $HeadCode;
        $account->HeadName = $request->HeadName;
        $account->PHeadName = $PHeadName;
        $account->PHeadCode = $PHeadCode;
        $account->HeadLevel = $HeadLevel;
        $account->save();


        // return view('acccoa.index', compact('accounts'));
        return redirect()->route('acccoa.create')->with('success', 'Insert successfully.');
        // return response()->json($account, 201);
    }


    public function show(TblAccCoa $tblAccCoa)
    {
        return response()->json($tblAccCoa);
    }

    public function predefine(Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {
            $accounts = TblAccCoa::all();
            $predefineaccounts = TblAccPredefineAccount::all();
            $predefineaccount = TblAccPredefineAccount::findOrFail(1);
            return view('acccoa.predefine', compact('predefineaccount','accounts','predefineaccounts'));
        }
        return redirect('/unauthorized');

    }

    public function predefineUpdate(Request $request){
        $predefineaccount = TblAccPredefineAccount::findOrFail(1);
        $fields = [
            'cashCode', 'bankCode', 'advance', 'fixedAsset', 'purchaseCode', 
            'salesCode', 'serviceCode', 'customerCode', 'supplierCode', 
            'costs_of_good_solds', 'vat', 'tax', 'inventoryCode', 'CPLCode', 
            'LPLCode', 'salary_code', 'emp_npf_contribution', 
            'empr_npf_contribution', 'emp_icf_contribution', 
            'empr_icf_contribution', 'prov_state_tax', 'state_tax', 'prov_npfcode'
        ];
    
        foreach ($fields as $field) {
            if ($request->has($field)) {
                $predefineaccount->$field = $request->$field;
            }
        }
        $predefineaccount->save();
        return redirect()->route('acccoa.index')->with('success', 'Updated successfully.');

    }
    public function edit($id, Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {
            $acccoa = TblAccCoa::findOrFail($id);
            $accounts = TblAccCoa::all();
            return view('acccoa.edit', compact('acccoa','accounts'));
        }
        return redirect('/unauthorized');

    }

    public function update(Request $request, TblAccCoa $tblAccCoa, $id)
    {
        // dd();
        $validated = $request->validate([
            'HeadName' => 'nullable|string|max:255',
        ]);

        if(empty($request->PHeadCode)){
            $countPHeadName = TblAccCoa::where('PHeadName','COA')->count();
            $HeadCode = $countPHeadName + 10001;
            $PHeadName = "COA";
            $PHeadCode = 0;
            $HeadLevel = 1;
        }elseif(!empty($request->PHeadCode)){
            $data = TblAccCoa::where('HeadCode',$request->PHeadCode)->first();
            $HeadCode = $data->HeadLevel;
            $countHeadCode = TblAccCoa::where('HeadLevel',$HeadCode+1)->count();
            
            $thousand = match ($data->HeadLevel) {
                1 => 20001,
                2 => 30001,
                3 => 40001,
            };
            $HeadCode = $countHeadCode + $thousand;
            $PHeadName = $data->HeadName;
            $PHeadCode = $data->HeadCode;
            $HeadLevel = $data->HeadLevel+1;
        }
        

        // $tblAccCoa->update($validated);
        $account = TblAccCoa::findOrFail($id);
        $account->HeadCode = $HeadCode;
        $account->HeadName = $request->HeadName;
        $account->PHeadName = $PHeadName;
        $account->PHeadCode = $PHeadCode;
        $account->HeadLevel = $HeadLevel;
        $account->save();
        return redirect()->route('acccoa.index')->with('success', 'Updated successfully.');
    }

    public function destroy(TblAccCoa $tblAccCoa)
    {
        $tblAccCoa->delete();
        return redirect()->route('acccoa.index')->with('success', 'Delete successfully.');
    }
}
