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
        'c_id',
    ];

    /**
     * Define relationships.
     */
    public function customer()
    {
        return $this->belongsTo(TblCustomer::class, 'c_id');
    }
}
