<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Permission;
class PermissionController extends Controller
{
    public function index()
    {
        // Fetch all permissions from the database
        $permissions = Permission::all();
        
        // Pass the permissions to the view
        return view('permissions.index', compact('permissions'));
    }
    
    public function create(Request $request){

    }
}
