<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManufactureReportLayoutField extends Model
{
    use HasFactory;

    protected $fillable = [
        'layout_id',
        'field_key',
        'label',
        'visible',
        'sort_order',
    ];

    public function layout()
    {
        return $this->belongsTo(ManufactureReportLayout::class, 'layout_id');
    }
    public function subCategory()
    {
        return $this->belongsTo(tbl_sub_category::class, 'field_key', 'id');
    }
}
