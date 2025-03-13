<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPayment extends Model
{
    use HasFactory;

    protected $table = 'tbl_customer_payments';
    protected $fillable = [
        'customer_id',
        'sell_id',
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
        'cheque_no',
        'bank_id',
        'notes',
    ];

    
    public function sell()
    {
        return $this->belongsTo(Sale::class, 'sell_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(TblCustomer::class, 'customer_id', 'id'); // 'customer_id' is the foreign key in tbl_sales, and 'id' is the primary key in tbl_customers
    }
}
