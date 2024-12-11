<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblPayment extends Model
{
    use HasFactory;
    protected $table = 'tbl_payments';

    protected $fillable = [
        'purchase_id',
        'sell_id',
        'amount_paid',
        'remaining_amount',
        'payment_date',
        'payment_method',
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
}
