<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_purchase_item extends Model
{
    use HasFactory;
    protected $table = "tbl_purchase_items";

    protected $fillable = [
        'invoice_no',
        'cid',
        'scid',
        'qty',
        'unit',
        'price',
        'total',
    ];

    public function category()
    {
        return $this->belongsTo(tbl_category::class, 'cid', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(tbl_sub_category::class, 'scid', 'id');
    }
}
