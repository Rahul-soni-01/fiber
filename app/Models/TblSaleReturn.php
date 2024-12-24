<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSaleReturn extends Model
{
    use HasFactory;
    protected $table = 'tbl_sale_returns';

    protected $fillable = [
        'date',
        'sr_no',
        'customer_id',
        'sale_id',
        'qty',
        'reason',
        'cname',
        'scname',
        'unit',
        'rate',
        
    ];

    /**
     * Define relationships.
     */
    public function customer()
    {
        return $this->belongsTo(TblCustomer::class, 'customer_id');
    }

    public function category()
    {
        return $this->belongsTo(TblSaleProductCategory::class, 'cid', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(TblSaleProductSubCategory::class, 'scid', 'id');
    }
}
