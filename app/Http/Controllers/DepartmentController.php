<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\TblUserController;


class DepartmentController extends Controller
{

    public function create(Request $request)
    {
        $tblUserController = app()->make('App\Http\Controllers\TblUserController');
        $permissions = $tblUserController->permission($request);
        dd($permissions);

        return view('departments.create');
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|unique:departments,name|max:255',
        ]);
        $department = Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Department created successfully');
    }
    public function index()
    {
        $departments = Department::all();
        return view('departments.index', compact('departments'));
    }
    public function edit($id)
    {
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
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
    public function destroy($id)
{
    $department = Department::findOrFail($id); // Find the department by ID
    $department->delete(); // Delete the department

    return redirect()->route('departments.index')->with('success', 'Department deleted successfully.'); // Redirect with success message
}
    
}
