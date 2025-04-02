<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblSaleProductCategory extends Model
{
    use HasFactory;

    protected $table = 'tbl_sale_product_category';
    
    protected $fillable = ['name', 'is_type'];

}
