<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\TblUserController;


class DepartmentController extends Controller
{

    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Department ?? [];
        return in_array($action, $permissions);
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            return view('departments.create');
        }
        return redirect('/unauthorized');

    }

    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|unique:departments,name|max:255',
        ]);
        $department = Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }
    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
        }
        return redirect('/unauthorized');

        
    }
    public function edit($id, Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {

        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
        }
        return redirect('/unauthorized');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $id,
        ]);

        $department = Department::findOrFail($id);
        $department->name = $request->name;
        $department->save();

        return redirect()->route('departments.index')->with('success', 'Department updated successfully.');
    }
    public function destroy($id, Request $request)
    {
        if ($this->checkPermission($request, 'delete')) {

        $department = Department::findOrFail($id); // Find the department by ID
        $department->delete(); // Delete the department

        return redirect()->route('departments.index')->with('success', 'Department deleted successfully.'); // Redirect with success message
        }
        return redirect('/unauthorized');

    }
    
}
