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
        /*$username = $req->username;
        $password = $req->password;

        $records = tbl_user::where('email', $username)
            ->where('password', $password)
            ->get();

        if ($records->isNotEmpty()) {
            $req->session()->put('uid', $records[0]);
            return redirect('home');
        } else
            return redirect('/')->with('msg', 'Invalid username or password');*/
    }

    function logout() 
    {
        Auth::logout();

        session()->pull('uid');
    
        return redirect('/')->with('msg', 'You have been logged out successfully.');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
      $users = tbl_user::all();
      return view( 'user.index', compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function check()
    {
        $u_id = Auth::user()->id;
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

    /**
     * Store a newly created resource in storage.
     */
    public function permission(Request $request)
    {
        $permissions = $this->check();
        return response()->json(['permissions' => $permissions]);
        
    }

    /**
     * Display the specified resource.
     */
    public function show(tbl_user $tbl_user)
    {
        $permissions = $this->check();
        return view('home', compact('permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tbl_user $tbl_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, tbl_user $tbl_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tbl_user $tbl_user)
    {
        //
    }
}
