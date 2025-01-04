<?php

namespace App\Http\Controllers;

use App\Models\TblAccCoa;
use Illuminate\Http\Request;
use App\Models\TblCustomer;
use App\Models\Sale;
use App\Models\TblSaleReturn;
use App\Models\CustomerPayment;
use App\Models\TblAccPredefineAccount;

class TblCustomerController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Party ?? [];
        return in_array($action, $permissions);
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            return view('customer.create');
        }
        return redirect('/unauthorized');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'telephone_no' => 'required|numeric',
            'receiver_name' => 'required|string|max:255',
            'gst_no' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Regex for GST Validation
                    $pattern = '/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/';

                    if (!preg_match($pattern, $value)) {
                        $fail('The GSt No must be a valid GST number.' . $value);
                    }
                },
            ],
            'ship_address' => 'nullable|string|max:255',
            'ship_pincode' => 'nullable|string|max:255',
            'ship_city' => 'nullable|string|max:255',
            'ship_state' => 'nullable|string|max:255',
        ]);
        
       /* $predefineaccount = TblAccPredefineAccount::findOrFail(1);
        // dd($predefineaccount);
        $HeadLevel = 3;

        $thousand = match ($HeadLevel) {
            1 => 20001,
            2 => 30001,
            3 => 40001,
        };

        $maxHeadCode = TblAccCoa::where('HeadLevel', )
                ->where('HeadCode', '>=', 40000)
                ->max('HeadCode');
                dd($maxHeadCode);
        if ($maxHeadCode) {
            $HeadCode = $maxHeadCode + 1;
        } else {
            $HeadCode = $thousand; // Start with the base value
        }
        $PHeadName = TblAccCoa::where('HeadCode',$predefineaccount->customerCode)->first()->HeadName;
        
        $newledger = new TblAccCoa();
        $newledger->HeadCode = $HeadCode;
        $newledger->HeadName = $request->customer_name;
        $newledger->PHeadName = $PHeadName;
        $newledger->PHeadCode = $predefineaccount->customerCode;
        $newledger->HeadLevel = 4;
        $HeadCode =  $newledger->save();*/


        $customer = new TblCustomer();
        $customer->customer_name = $request->customer_name;
        $customer->HeadCode = $HeadCode ?? 0;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->telephone_no = $request->telephone_no;
        $customer->receiver_name = $request->receiver_name;
        $customer->gst_no = $request->gst_no ?? null;
        $customer->ship_address = $request->ship_address ?? null;
        $customer->ship_pincode = $request->ship_pincode ?? null;
        $customer->ship_city = $request->ship_city ?? null;
        $customer->ship_state = $request->ship_state ?? null;
        $result = $customer->save();

        if ($result) {
            return redirect()->route('customer.index')->with('success', 'Customer added successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to add customer.');
        }
    }

    public function index(TblCustomer $tblCustomer, Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $customers = TblCustomer::all();
            return view('customer.index', ['customers' => $customers]);
        }
        return redirect('/unauthorized');
    }
    public function edit(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {
    
            $customer = TblCustomer::findOrFail($id);
            return view('customer.edit', compact('customer'));
        }
        return redirect('/unauthorized');
    }
    public function update(Request $request, TblCustomer $tblCustomer, $id)
    {
        $request->validate([
            'customer_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'pincode' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:255',
            'telephone_no' => 'required|numeric',
            'receiver_name' => 'required|string|max:255',
            'gst_no' => [
                'nullable',
                function ($attribute, $value, $fail) {
                    // Regex for GST Validation
                    $pattern = '/^[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}[Z]{1}[0-9A-Z]{1}$/';

                    if (!preg_match($pattern, $value)) {
                        $fail('The GSt No must be a valid GST number.' . $value);
                    }
                },
            ],
            'ship_address' => 'nullable|string|max:255',
            'ship_pincode' => 'nullable|string|max:255',
            'ship_city' => 'nullable|string|max:255',
            'ship_state' => 'nullable|string|max:255',
        ]);
    
        $customer = TblCustomer::findOrFail($id);
    
        $customer->customer_name = $request->customer_name;
        $customer->address = $request->address;
        $customer->pincode = $request->pincode;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->telephone_no = $request->telephone_no;
        $customer->receiver_name = $request->receiver_name;
        $customer->gst_no = $request->gst_no;
        $customer->ship_address = $request->ship_address;
        $customer->ship_pincode = $request->ship_pincode;
        $customer->ship_city = $request->ship_city;
        $customer->ship_state = $request->ship_state;
    
        $result = $customer->save();
    
        if ($result) {
            return redirect()->route('customer.index')->with('success', 'Customer updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Failed to update customer.');
        }
    }
    public function destroy(TblCustomer $tblCustomer, $id, Request $request)
    {
        if ($this->checkPermission($request, 'delete')) {
            $customer = $tblCustomer->find($id);
            if ($customer) {
                $customer->delete();
                return redirect()->route('customer.index')->with('success', 'Customer deleted successfully.');
            }
            return redirect()->route('customer.index')->with('error', 'Customer not found.');
        }
        return redirect('/unauthorized');
    }

    public function Sale_details(TblCustomer $tblCustomer, $id, Request $request){
        
        $CustomerPayment = CustomerPayment::with('customer')
        ->where('customer_id',$id )
        ->get();
        $sales = Sale::with('customer')
        ->where('customer_id',$id)
        ->get();
        
        $salereturns = TblSaleReturn::with('customer')
        ->where('customer_id',$id)
        ->get();
        // dd($salereturns);
        
 
        return view('customer.SellDetails', ['sales' => $sales,'salereturns'=>$salereturns,'CustomerPayments'=>$CustomerPayment,'id'=>$id]);
    }
}
