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
        'address',
        'telephone_no',
        'receiver_name',
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
        return $this->hasMany(TblSaleReturn::class, 'c_id');
    }
    
}
