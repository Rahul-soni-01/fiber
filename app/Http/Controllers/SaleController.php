<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SaleItem;
use App\Models\Sale;
use App\Models\tbl_party;
use App\Models\tbl_category;
use App\Models\tbl_sub_category;
use App\Models\Report;


class SaleController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Sale ?? [];
        return in_array($action, $permissions);
    }
    public function index(Request $request)
    {
        if ($this->checkPermission($request, 'view')) {
            $categories = Sale::all();
            // dd($categories);
            return view('category.index', compact('categories'));
        }
        return redirect('/unauthorized');
    }

    public function create(Request $request)
    {
        if ($this->checkPermission($request, 'add')) {
            // $categories = tbl_category::all();

            $partyname = tbl_party::all();
            $inwards = tbl_category::all();
            $items = tbl_sub_category::all();
            $serial_nos = Report::where('status','1')
                          ->where('part','0')->get()->sortBy('sr_no_fiber');
            
            return view('sale.create', compact('partyname', 'inwards', 'items','serial_nos'));
            

        }
        return redirect('/unauthorized');

    }
}
