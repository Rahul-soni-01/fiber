<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    protected $table = "tbl_purchase_item";

    protected $fillable = [
        'invoice_no',
        'category_name',
        'sub_category_name',
        'qty',
        'unit',
        'price',
        'total',
    ];
}
