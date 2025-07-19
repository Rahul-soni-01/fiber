<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ManagePermission;
use App\Models\Department;
use App\Models\Permission;
use App\Models\Sale;
use Carbon\Carbon;
use App\Models\tbl_purchase;
use App\Models\Report;
use App\Models\TblPayment;
use App\Models\CustomerPayment;

class TblUserController extends Controller
{
    public function login(Request $req)
    {
        // dd(Hash::check($req->password));
        $req->validate([
            'username' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = tbl_user::where('email', $req->username)->first();

        if ($user) {
            if (Hash::check($req->password, $user->password)) {
                Auth::login($user);
                return redirect('/home');
            } else {
                return redirect('/')->with('msg', 'Invalid username or password');
            }
        } else {
            return redirect('/')->with('msg', 'Invalid username or password');
        }
    }

    public function logout()
    {
        Auth::logout();

        session()->pull('uid');

        return redirect('/')->with('msg', 'You have been logged out successfully.');
    }
    public function check()
    {
        $u_id = Auth::user()->id;
        if (auth()->user()->type === 'admin') {
            $departments = Department::pluck('name', 'id');
            $permissions = Permission::pluck('name')->toArray();

            $result = [];
            foreach ($departments as $departmentId => $departmentName) {
                $result[$departmentName] = $permissions; // Admin has all permissions for each department
            }

            return $result;
        }


        $managePermission = ManagePermission::where('uid', $u_id)->first();

        if ($managePermission) {
            $p_id_data = collect($managePermission->p_id);

            $departmentIds = $p_id_data->keys()->toArray();
            $departments = Department::whereIn('id', $departmentIds)->pluck('name', 'id');  // Pluck 

            $result = [];

            foreach ($p_id_data as $departmentId => $permissionIds) {
                $departmentName = $departments[$departmentId] ?? 'Unknown Department';
                $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();
                $result[$departmentName] = $permissions;
            }
            return $result;
        }
        // dd($result);

        return [];

    }

    public function permission(Request $request)
    {
        $permissions = $this->check();

        $type = auth()->user()->type;
        return response()->json(['permissions' => $permissions, 'type' => $type]);

    }
    public function index()
    {
        $permissionsData = $this->permission(request())->getData()->permissions->User ?? [];
        if (in_array('view', $permissionsData)) {
            $users = tbl_user::all();
            // $users = tbl_user::where('id', '!=', auth()->id())->get(); // exclude current user
            // dd($users);
            return view('user.index', compact('users'));
        }
        return redirect('/unauthorized');

    }

    public function create()
    {
        $permissionsData = $this->permission(request())->getData()->permissions->User ?? [];
        if (in_array('add', $permissionsData)) {
            $typies = tbl_user::select('type')->distinct()->get();
            $departments = Department::all();

            return view('user.create', compact('typies', 'departments'));
        }
        return redirect('/unauthorized');

    }
    public function store(Request $request)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'dept' => 'required|integer',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tbl_users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = new tbl_user();
        $user->name = $request->input('user_name');
        $user->type = strtolower($request->input('type'));
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); // Hash the password
        $user->d_id = $request->input('dept');
        $user->save();

        return redirect()->route('user.index')->with('success', 'User added successfully!');
    }
    public function show(tbl_user $tbl_user)
    {
        $permissions = $this->check();
        $sales = Sale::whereDate('created_at', Carbon::today())->get();
        $purchases = tbl_purchase::whereDate('created_at', Carbon::today())->get();
        $repairreports = Report::where('part',0)->whereDate('created_at', Carbon::today())->get();
        $newreports = Report::where('part',1)->whereDate('created_at', Carbon::today())->get();
        // $reports = Report::whereDate('created_at', Carbon::today())->get();
        $supplier_payments = TblPayment::whereDate('created_at', Carbon::today())->get();
        $customer_payments = CustomerPayment::whereDate('created_at', Carbon::today())->get();
        // dd([
        //     'sales' => $sales,
        //     'purchases' => $purchases,
        //     'reports' => $reports,
        //     'supplier_payments' => $supplier_payments,
        //     'customer_payments' => $customer_payments,
        // ]);
        return view('home', compact('permissions', 'sales', 'purchases', 'repairreports','newreports', 'supplier_payments','customer_payments'));
    }

    public function edit(tbl_user $tbl_user, Request $request, $id)
    {
        $permissionsData = $this->permission(request())->getData()->permissions->User ?? [];
        if (in_array('edit', $permissionsData)) {
            $user = tbl_user::findOrFail($id);
            $typies = tbl_user::select('type')->distinct()->get();
            $departments = Department::all();

            return view('user.edit', compact('user', 'typies', 'departments'));
        }
        return redirect('/unauthorized');
    }

    public function update(Request $request, tbl_user $tbl_user, $id)
    {
        $request->validate([
            'type' => 'required|string|max:255',
            'dept' => 'required|integer',
            'user_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:tbl_users,email,' . $id,
            'password' => 'nullable|string|min:8|confirmed', // Password is optional during update
        ]);

        $user = tbl_user::findOrFail($id);
        $user->name = $request->input('user_name');
        $user->type = strtolower($request->input('type'));
        $user->email = $request->input('email');
        $user->d_id = $request->input('dept');
        if ($request->filled('password')) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();

        return redirect()->route('user.index')->with('success', 'User updated successfully.');
    }

    public function destroy(tbl_user $tbl_user, $id)
    {
        $permissionsData = $this->permission(request())->getData()->permissions->User ?? [];
        if (in_array('delete', $permissionsData)) {
            $user = $tbl_user->find($id);
            $user->delete();
            return redirect()->route('user.index')->with('success', 'Deleted Successfully.');
        }
    }
}
