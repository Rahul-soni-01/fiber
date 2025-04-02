<?php

namespace App\Http\Controllers;

use App\Models\TblAccCoa;
use App\Models\TblAccPredefineAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
            return view('acccoa.create', compact('accounts'));
        }
        return redirect('/unauthorized');

    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'HeadName' => 'nullable|string|max:255',
        ]);

        if (empty($request->PHeadCode)) {
            $countPHeadName = TblAccCoa::where('PHeadName', 'COA')->count();
            $HeadCode = $countPHeadName + 10001;
            $PHeadName = "COA";
            $PHeadCode = 0;
            $HeadLevel = 1;
        } elseif (!empty($request->PHeadCode)) {
            $data = TblAccCoa::where('HeadCode', $request->PHeadCode)->first();
            $HeadCode = $data->HeadLevel;

            $thousand = match ($data->HeadLevel) {
                1 => 20001,
                2 => 30001,
                3 => 40001,
            };
            $countHeadCode = TblAccCoa::where('HeadLevel', $HeadCode + 1)->count();

            $maxHeadCode = TblAccCoa::where('HeadLevel', $data->HeadLevel + 1)
                ->where('HeadCode', '>=', $thousand)
                ->max('HeadCode');
            if ($maxHeadCode) {
                $HeadCode = $maxHeadCode + 1;
            } else {
                $HeadCode = $thousand; // Start with the base value
            }

            $PHeadName = $data->HeadName;
            $PHeadCode = $data->HeadCode;
            $HeadLevel = $data->HeadLevel + 1;
        }
        // dd($data,$thousand,$countHeadCode,$maxHeadCode,$HeadLevel,$HeadCode);
        $account = new TblAccCoa();
        $account->HeadCode = $HeadCode;
        $account->HeadName = $request->HeadName;
        $account->PHeadName = $PHeadName;
        $account->PHeadCode = $PHeadCode;
        $account->HeadLevel = $HeadLevel;
        $account->save();

        return redirect()->route('acccoa.create')->with('success', 'Insert successfully.');
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
            return view('acccoa.predefine', compact('predefineaccount', 'accounts', 'predefineaccounts'));
        }
        return redirect('/unauthorized');

    }

    public function predefineUpdate(Request $request)
    {
        $predefineaccount = TblAccPredefineAccount::findOrFail(1);
        $fields = [
            'cashCode',
            'bankCode',
            'advance',
            'fixedAsset',
            'purchaseCode',
            'salesCode',
            'serviceCode',
            'customerCode',
            'supplierCode',
            'costs_of_good_solds',
            'vat',
            'tax',
            'inventoryCode',
            'CPLCode',
            'LPLCode',
            'salary_code',
            'emp_npf_contribution',
            'empr_npf_contribution',
            'emp_icf_contribution',
            'empr_icf_contribution',
            'prov_state_tax',
            'state_tax',
            'prov_npfcode'
        ];

        foreach ($fields as $field) {
            if ($request->has($field)) {
                $predefineaccount->$field = $request->$field;
            }
        }
        $predefineaccount->save();
        return redirect()->route('predefine.index')->with('success', 'Updated successfully.');

    }
    public function edit($id, Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {
            $acccoa = TblAccCoa::findOrFail($id);
            $accounts = TblAccCoa::all();
            return view('acccoa.edit', compact('acccoa', 'accounts'));
        }
        return redirect('/unauthorized');

    }

    public function update(Request $request, TblAccCoa $tblAccCoa, $id)
    {
        // dd();
        $validated = $request->validate([
            'HeadName' => 'nullable|string|max:255',
        ]);

        if (empty($request->PHeadCode)) {
            $countPHeadName = TblAccCoa::where('PHeadName', 'COA')->count();
            $HeadCode = $countPHeadName + 10001;
            $PHeadName = "COA";
            $PHeadCode = 0;
            $HeadLevel = 1;
        } elseif (!empty($request->PHeadCode)) {
            $data = TblAccCoa::where('HeadCode', $request->PHeadCode)->first();
            $HeadCode = $data->HeadLevel;
            $countHeadCode = TblAccCoa::where('HeadLevel', $HeadCode + 1)->count();

            $thousand = match ($data->HeadLevel) {
                1 => 20001,
                2 => 30001,
                3 => 40001,
            };
            $HeadCode = $countHeadCode + $thousand;
            $PHeadName = $data->HeadName;
            $PHeadCode = $data->HeadCode;
            $HeadLevel = $data->HeadLevel + 1;
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

    public function getMaxFieldNumber($field, $table, $where = null, $type = null, $field2 = null)
    {
        $query = DB::table($table)
            ->select('*');

        if ($where !== null) {
            $query->where($where, $type);
        }

        $record = $query->orderBy('id', 'desc')->first();
        // $data = DB::table($table)->select($field);
        if ($record) {
            if ($field2 !== null) {
                $num = $record->{$field2};
                // dd($record,$field2,$num);
                if (strpos($num, '-') !== false) { // Ensure it can be split
                    list($txt, $intval) = explode('-', $num);
                    return (int) $intval; // Return the numeric part
                }
            } else {
                // Return the value of the primary field
                return $record->{$field};
            }
        }

        // Default return value when no record exists
        return 0;
    }
}
