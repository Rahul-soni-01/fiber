<?php

namespace App\Http\Controllers;

use App\Models\tbl_user;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\ManagePermission;
use App\Models\Department;
use App\Models\Permission;

class TblUserController extends Controller
{
    public function login(Request $req)
    {
        $req->validate([
            'username' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $user = tbl_user::where('email', $req->username)->first();

        if ($user) {
            // dd(Hash::check($req->password,$user->password));
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
            $users = tbl_user::where('id', '!=', auth()->id())->get();
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
        return view('home', compact('permissions'));
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
