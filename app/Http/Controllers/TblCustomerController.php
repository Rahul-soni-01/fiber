<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TblCustomer;
use App\Models\Sale;
use App\Models\TblSaleReturn;
use App\Models\CustomerPayment;


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
            'telephone_no' => 'required|numeric',
            'receiver_name' => 'required|string|max:255',
        ]);


        $customer = new TblCustomer();
        $customer->customer_name = $request->customer_name;
        $customer->address = $request->address;
        $customer->telephone_no = $request->telephone_no;
        $customer->receiver_name = $request->receiver_name;


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
            'telephone_no' => 'required|numeric',
            'receiver_name' => 'required|string|max:255',
        ]);
    
        $customer = TblCustomer::findOrFail($id);
    
        $customer->customer_name = $request->customer_name;
        $customer->address = $request->address;
        $customer->telephone_no = $request->telephone_no;
        $customer->receiver_name = $request->receiver_name;
    
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
        ->where('c_id',$id)
        ->get();
        // dd($salereturns);
        
 
        return view('customer.SellDetails', ['sales' => $sales,'salereturns'=>$salereturns,'CustomerPayments'=>$CustomerPayment,'id'=>$id]);
    }
}
