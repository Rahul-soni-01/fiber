<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblStock extends Model
{
    use HasFactory;

    protected $table = 'tbl_stock';

    protected $fillable = [
        'date', 
        'invoice_no', 
        'cid', 
        'scid', 
        'serial_no', 
        'qty', 
        'price', 
        'priceofUnit',
        'status',
        'dead_status'
    ];

    public function category()
    {
        return $this->belongsTo(tbl_category::class, 'cid', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(tbl_sub_category::class, 'scid', 'id');
    }
    public function purchase()
    {
        return $this->belongsTo(tbl_purchase::class, 'invoice_no', 'id');
    }
}
