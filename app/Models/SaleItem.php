<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    use HasFactory;
    protected $table = 'tbl_sales_items';

    // Specify the fillable fields
    protected $fillable = [
        'sale_id',
        'product_id',
        'quantity',
        'price',
        'total',
    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'id');
    }
}
