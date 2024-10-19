<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\tbl_sub_category;

class ReportController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Report ?? [];
        return in_array($action, $permissions);
    }

    public function index(Request $request){
        if ($this->checkPermission($request, 'view')) {
            return view("report.index");
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request){
        if ($this->checkPermission($request, 'add')) {
            $sub_categories = tbl_sub_category::where('cid',1 )->get();
            
            return view("report.create",compact('sub_categories'));
        }
        return redirect('/unauthorized');
    }

    public function store(Request $request){
        dd($request->all());
    }
}
