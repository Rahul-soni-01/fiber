<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\PartyModel;
use App\Models\CategoryModel;
use App\Models\SubCategoryModel;

class PartynameController extends Controller
{
    public function view()
    {
        $partyname = PartyModel::all();
        $inwards = CategoryModel::all();
        $items = SubCategoryModel::all();
        return view('good_inward', compact('partyname', 'inwards', 'items'));
    }
}
