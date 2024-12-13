<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPayment extends Model
{
    use HasFactory;
    protected $table = 'tbl_payments';

    protected $fillable = [
        'supplier_id',
        'purchase_id',
        // 'sell_id',
        'amount_paid',
        'remaining_amount',
        'payment_date',
        'payment_method',
        'transaction_type',
        'bank_name',
        'account_holder_name',
        'branch_name',
        'account_number',
        'account_type',
        'ifsc_code',
        'notes',
    ];

    public function purchase()
    {
        return $this->belongsTo(tbl_purchase::class, 'purchase_id', 'id');
    }
    public function sell()
    {
        return $this->belongsTo(Sale::class, 'sell_id', 'id');
    }
    public function supplier()
    {
        return $this->belongsTo(tbl_party::class, 'supplier_id', 'id');
    }
    
}
