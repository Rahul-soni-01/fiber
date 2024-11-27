<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPurchaseReturn extends Model
{
    use HasFactory;
    protected $table = 'tbl_purchase_returns';

    // Specify the fillable fields for mass assignment
    protected $fillable = [
        'date',
        'p_id',
        'invoice_no',
    ];

    // Define any relationships (if needed)
    public function party()
    {
        return $this->belongsTo(tbl_party::class, 'p_id', 'id');
    }

    public function purchaseReturnDetails()
    {
        // return $this->hasMany(TblPurchaseReturnItem::class, 'invoice_no');
        return $this->hasMany(TblPurchaseReturnItem::class, 'invoice_no', 'invoice_no');

        // return $this->belongsTo(TblPurchaseReturnItem::class, 'invoice_no', 'invoice_no');
    }
}
