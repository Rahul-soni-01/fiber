<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tbltype;

class TbltypeController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Type ?? [];
        return in_array($action, $permissions);
    }
    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            return view('types.create');
        }
        return redirect('/unauthorized');

    }

    public function store(Request $request)
    {
    
        $request->validate([
            'name' => 'required|max:255',
        ]);
        $Tbltype = Tbltype::create($request->all());
        return redirect()->route('type.index')->with('success', 'Tbltype created successfully');
    }
    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $types = Tbltype::all();
            return view('types.index', compact('types'));
        }
        return redirect('/unauthorized');

        
    }
    public function edit($id, Request $request)
    {
        if ($this->checkPermission($request, 'edit')) {

        $type = Tbltype::findOrFail($id);
        return view('types.edit', compact('type'));
        }
        return redirect('/unauthorized');

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $department = Tbltype::findOrFail($id);
        $department->name = $request->name;
        $department->save();

        return redirect()->route('type.index')->with('success', 'Tbltype updated successfully.');
    }
    public function destroy($id, Request $request)
    {
        if ($this->checkPermission($request, 'delete')) {

        $department = Tbltype::findOrFail($id); // Find the department by ID
        $department->delete(); // Delete the department

        return redirect()->route('type.index')->with('success', 'Type deleted successfully.'); // Redirect with success message
        }
        return redirect('/unauthorized');

    }

}
