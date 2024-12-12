<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomerPayment;
use App\Models\TblPayment;

class PaymentController extends Controller
{
    private function checkPermission(Request $request, $action)
    {
        $permissions = app()->make('App\Http\Controllers\TblUserController')->permission($request)->getData()->permissions->Department ?? [];
        return in_array($action, $permissions);
    }

    

}
