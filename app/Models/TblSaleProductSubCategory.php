<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSaleProductSubCategory extends Model
{
    use HasFactory;
    protected $table = 'tbl_sale_product_subcategory';
    
    protected $fillable = [
        'spcid',
        'name',
        'unit',
        'sr_no'
    ];
    
    public function category()
    {
        return $this->belongsTo(TblSaleProductCategory::class, 'spcid', 'id'); // Adjust foreign key and local key as needed
    }
}
