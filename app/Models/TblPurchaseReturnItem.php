<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPurchaseReturnItem extends Model
{
    use HasFactory;
    protected $table = 'tbl_purchase_return_items';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'invoice_no',
        'cid',
        'scid',
        'qty',
        'unit',
        'price',
    ];

    // Define relationships (if applicable)
    public function purchaseReturn()
    {
        return $this->belongsTo(TblPurchaseReturn::class, 'invoice_no', 'invoice_no');
    }
}
