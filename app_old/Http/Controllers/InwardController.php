<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\InwardModel1;

class InwardController extends Controller
{
    public function view()
    {
        $inwards = InwardModel1::all();
        return view('add_srno', compact('inwards'));
    }
}
