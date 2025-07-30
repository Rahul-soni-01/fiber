<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    use HasFactory;

    protected $table = 'estimates';

    protected $fillable = [
        'in_date',
        'sr_no',
        'price',
        'cid',
    ];

    public function customer()
    {
        return $this->belongsTo(TblCustomer::class, 'cid', 'id'); // 'customer_id' is the foreign key in tbl_sales, and 'id' is the primary key in tbl_customers
    }
}
