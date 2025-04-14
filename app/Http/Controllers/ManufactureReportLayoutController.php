<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ManufactureReportLayout;
use App\Models\tbl_user;
use App\Models\ManufactureReportLayoutField;

class ManufactureReportLayoutController extends Controller
{
    public function index()
    {
        $layouts = ManufactureReportLayout::all();
        return view('layouts.index', compact('layouts'));
    }

    public function create()
    {
        return view('layouts.create');
    }

    public function store(Request $request)
    {

        // dd(Auth()->user()->id);
        $request->validate([
            'name' => 'required|string|max:255',
            'fields' => 'required|array|min:1',
            'fields.*.field_key' => 'required|string|max:255',
            'fields.*.label' => 'required|string|max:255',
            'fields.*.sort_order' => 'nullable|integer',
        ]);
    
        $layout = ManufactureReportLayout::create([
            'name' => $request->name,
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
        $layout = ManufactureReportLayout::with('fields')->findOrFail($id);
        return view('layouts.edit', compact('layout'));
    }
    public function show($id)
    {
        $layout = ManufactureReportLayout::with('fields')->findOrFail($id);
        return view('layouts.show', compact('layout'));
    }

    public function update(Request $request, $id)
    {
        $layout = ManufactureReportLayout::findOrFail($id);
        $layout->update([
            'name' => $request->name,
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
