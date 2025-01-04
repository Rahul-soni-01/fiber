<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblCustomer extends Model
{
    use HasFactory;

    protected $table = 'tbl_customers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'customer_name',
        'HeadCode',
        'address',
        'pincode',
        'city',
        'state',
        'telephone_no',
        'receiver_name',
        'gst_no',
        'ship_address',
        'ship_pincode',
        'ship_city',
        'ship_state',
    ];

    public function Cuspayments()
    {
        return $this->hasMany(CustomerPayment::class, 'customer_id');
    }
    public function sales()
    {
        return $this->hasMany(Sale::class, 'customer_id', 'id');
    }

    public function SaleReturn()
    {
        return $this->hasMany(TblSaleReturn::class, 'customer_id');
    }
    
}
