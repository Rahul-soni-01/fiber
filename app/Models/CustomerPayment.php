<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory;

    protected $table = 'tbl_customer_payments';

    protected $fillable = [
        // 'purchase_id',
        'sell_id',
        'amount_paid',
        'remaining_amount',
        'payment_date',
        'payment_method',
        'notes',
    ];

    
    public function sell()
    {
        return $this->belongsTo(Sale::class, 'sell_id', 'id');
    }
}
