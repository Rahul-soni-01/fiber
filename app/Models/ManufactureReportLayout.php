<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManufactureReportLayout extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'part',
        'type',
        'description',
        'created_by',
        'is_active',
    ];

    public function fields()
    {
        return $this->hasMany(ManufactureReportLayoutField::class, 'layout_id')->orderBy('sort_order');
    }

    // Optional: scope to get active layout
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
    public function tbl_type()
    {
        return $this->belongsTo(Tbltype::class, 'type', 'id');
    }
}
