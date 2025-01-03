<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Http\Controllers\TblUserController;
use Illuminate\Support\Facades\DB;


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

    public function websetting()
    {
        if (Auth()->user()->type === 'admin') {
            $websetting = DB::table('web_settings')->where('id', 1)->first();

            return view('websetting', compact('websetting'));
        }
    }

    public function updateWebSetting(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'company_name' => 'required|string|max:255',
            'company_address' => 'required|string|max:255',
            'PAN_no' => 'required|string|max:255',
            'GSTIN_no' => 'required|string|max:255',
            'phno' => 'required|string|max:255',
            'email' => 'required|email|string|max:255',
            'lutno' => 'required|string|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'invoice_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'favicon' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'currency' => 'required|string|max:10',
            'timezone' => 'required|string|max:255',
            'footer_text' => 'nullable|string|max:500',
            'language' => 'required|string|max:10',
        ]);
    
        // Handle file uploads (if present)
        $logoPath = $this->handleFileUpload($request, 'logo', 'logo');
        $invoiceLogoPath = $this->handleFileUpload($request, 'invoice_logo', 'invoice_logo');
        $faviconPath = $this->handleFileUpload($request, 'favicon', 'favicon');
        
        // Prepare data to be updated in the database
        $dataToUpdate = [
            'company_name' => $validated['company_name'],
            'company_address' => $validated['company_address'],
            'PAN_no' => $validated['PAN_no'],
            'GSTIN_no' => $validated['GSTIN_no'],
            'phno' => $validated['phno'],
            'email' => $validated['email'],
            'lutno' => $validated['lutno'],
            'currency' => $validated['currency'],
            'timezone' => $validated['timezone'],
            'footer_text' => $validated['footer_text'],
            'language' => $validated['language'],
            'updated_at' => now(),
        ];
    
        // Only add file paths if they are not null
        if ($logoPath) {
            $dataToUpdate['logo'] = $logoPath;
        }
    
        if ($invoiceLogoPath) {
            $dataToUpdate['invoice_logo'] = $invoiceLogoPath;
        }
    
        if ($faviconPath) {
            $dataToUpdate['favicon'] = $faviconPath;
        }
    
        // Update the database
        DB::table('web_settings')->where('id', 1)->update($dataToUpdate);
    
        // Redirect with success message
        return redirect()->route('websetting')->with('success', 'Web setting updated successfully!');
    }
    
    /**
     * Handle file upload and return file path.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $fileInput
     * @param  string  $folder
     * @return string|null
     */
    private function handleFileUpload(Request $request, $fileInput, $folder)
{
    if ($request->hasFile($fileInput)) {
        // Get the file
        $file = $request->file($fileInput);

        // Generate a unique file name
        $fileName = uniqid() . '.' . $file->getClientOriginalExtension();

        // Define the destination path (public/storage folder)
        $destinationPath = public_path('storage/' . $folder);

        // Make sure the folder exists
        if (!file_exists($destinationPath)) {
            mkdir($destinationPath, 0775, true);  // Create folder if not exists
        }

        // Move the file to the public/storage folder
        $file->move($destinationPath, $fileName);

        // Return the relative path to the file
        return 'storage/' . $folder . '/' . $fileName;
    }

    return null;
}

    

}
