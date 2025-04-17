<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManufactureReportLayout;
use App\Models\tbl_user;
use App\Models\tbl_sub_category;
use App\Models\ManufactureReportLayoutField;
use App\Models\Tbltype;

class ManufactureReportLayoutController extends Controller
{
    public function index()
    {
        // $types = Tbltype::all();
        $layouts = ManufactureReportLayout::with('tbl_type')->get();
        // dd($layouts);
        return view('layouts.index', compact('layouts'));
    }

    public function create()
    {
        $types = Tbltype::all();
        $sub_categories = tbl_sub_category::with('category')->get();
        return view('layouts.create',compact('sub_categories','types'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|exists: tbl_types,id', // assuming you're validating against a 'types' table
            'fields' => 'required|array|min:1',
            'fields.*.field_key' => 'required|max:255',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.sort_order' => 'nullable|integer',
        ]);
        if ($request->has('is_active')) {
            $exists = ManufactureReportLayout::where('type', $request->type)
                        ->where('is_active', true)
                        ->exists();
        
            if ($exists) {
                return back()->withErrors(['is_active' => 'An active layout for the selected type already exists.'])
                             ->withInput();
            }
        }
        $layout = ManufactureReportLayout::create([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'created_by' => auth()->check() ? auth()->user()->id : 4,
            'is_active' => $request->has('is_active'),
        ]);
    
        foreach ($request->fields as $index => $field) {
            ManufactureReportLayoutField::create([
                'layout_id' => $layout->id,
                'field_key' => $field['field_key'],
                'label' => $field['label'],
                'visible' => isset($field['visible']),
                'sort_order' => $field['sort_order'] ?? ($index + 1),
            ]);
        }

        return redirect()->route('layouts.index')->with('success', 'Layout created.');
    }

    public function edit($id)
    {
        $types = Tbltype::all();
        $sub_categories = tbl_sub_category::with('category')->get();
        $layout = ManufactureReportLayout::with('fields')->findOrFail($id);
        // dd($layout, $sub_categories);
        return view('layouts.edit', compact('layout','sub_categories','types'));
    }
    public function show($id)
    {
        $layout = ManufactureReportLayout::with('fields')->findOrFail($id);
        return view('layouts.show', compact('layout'));
    }

    public function update(Request $request, $id)
    {
        $layout = ManufactureReportLayout::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'type' => 'required|exists:tbl_types,id', // assuming you're validating against a 'types' table
            'fields' => 'required|array|min:1',
            'fields.*.field_key' => 'required|max:255',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.sort_order' => 'nullable|integer',
        ]);
        if ($request->has('is_active')) {
            $exists = ManufactureReportLayout::where('type', $request->type)
                        ->where('is_active', true)
                        ->exists();
        
            if ($exists) {
                return back()->withErrors(['is_active' => 'An active layout for the selected type already exists.'])
                             ->withInput();
            }
        }
        $layout->update([
            'name' => $request->name,
            'type' => $request->type,
            'description' => $request->description,
            'is_active' => $request->has('is_active'),
        ]);

        foreach ($request->fields as $fieldId => $fieldData) {
            ManufactureReportLayoutField::where('id', $fieldId)->update([
                'label' => $fieldData['label'],
                'visible' => isset($fieldData['visible']),
                'sort_order' => $fieldData['sort_order'],
            ]);
        }

        return redirect()->back()->with('success', 'Layout updated successfully.');
    }

    public function destroy($id)
    {
        $layout = ManufactureReportLayout::findOrFail($id);
        $layout->delete();
        return redirect()->route('layouts.index')->with('success', 'Layout deleted.');
    }
}
