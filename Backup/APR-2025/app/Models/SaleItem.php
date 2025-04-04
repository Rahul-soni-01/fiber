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
        'sid',
        'sale_id',
        'report_id',
        'cname',
        'scname',
        'unit',
        'sr_no',
        'qty',
        'rate',
        'p_tax',
        'total',
        'status',
    ];
    public function sale()
    {
        return $this->belongsTo(Sale::class, 'sale_id', 'sale_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id'); 
    }
    public function category()
    {
        return $this->belongsTo(TblSaleProductCategory::class, 'cname', 'id');
    }

    public function subCategory()
    {
        return $this->belongsTo(TblSaleProductSubCategory::class, 'scname', 'id');
    }
    public function replacement(){
        return $this->belongsTo(Replacement::class,'id','old_item_id');
    }
}
