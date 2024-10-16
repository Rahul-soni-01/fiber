<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManagePermission;
use App\Models\Permission;
use App\Models\tbl_user;
use App\Models\Department;
use Illuminate\Support\Facades\DB;


class ManagePermissionController extends Controller
{
    public function index()
    {
        $user_id = auth()->user()->id;
        $managepermissions = ManagePermission::where("uid", $user_id)->first();
        // dd($managepermissions);

        $managePermissions = ManagePermission::with('user','user.department')->get();
        // Get departments and permissions for each manage permission
        foreach ($managePermissions as $permission) {
            $permission->departments = $permission->departments();
            $permission->permissions = $permission->permissions();
        }
        // dd($managePermissions);
        return view('ManagePermissions.index', compact('managePermissions'));
    }
    public function edit($id){
        $managePermission = ManagePermission::with('user')->findOrFail($id);
        $users = tbl_user::all();
        $departments = Department::all();
        $permissions = Permission::all();

        return view('ManagePermissions.edit', compact('managePermission', 'users', 'departments', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'd_id' => 'required|array',
            'p_id' => 'required|array',
        ]);
        $d_ids = $request->d_id;
        $p_id =  $request->p_id;

        $departmentsWithPermissions = array_keys($p_id);

        // Find any departments with permissions that were not selected
        $invalidDepartments = array_diff($departmentsWithPermissions, $d_ids);
    
        if (!empty($invalidDepartments)) {
            // If there are invalid departments, return an error message
            return back()->withErrors([
                'permissions' => 'You have selected permissions for unselected departments: ' . implode(', ', $invalidDepartments)
            ])->withInput();
        }
        
        $json_d_ids = json_encode($d_ids);
        $json_p_ids = json_encode($p_id);

        
        /*$p_ids = [];
            foreach ($request->p_id as $department_id => $permissions) {
                $p_ids[$department_id] = array_map('intval', $permissions);
            }
            $json_d_ids = '[' . implode(',', $d_ids) . ']'; 
            $json_p_ids = '[' . implode(',', array_map(function($arr) {
                return '[' . implode(',', $arr) . ']';
            }, array_values($p_ids))) . ']';*/
       
        $managePermission = DB::table('manage_permission')
            ->where('id', $id)
            ->update([
                'd_id' => $json_d_ids,
                'p_id' => $json_p_ids
            ]);
    
        // dd($managePermission);
        return redirect()->route('manage.permissions')->with('success','Update SuccessFully');
        
    }
}
