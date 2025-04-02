<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblExpense extends Model
{
    use HasFactory;

    protected $table = 'tbl_expensive';

    protected $fillable = [
        'date',
        'name',
        'amount',
        'payment_type',
        'transaction_type',
        'bank_id',
        'cheque_no',
        'notes',
    ];
}
