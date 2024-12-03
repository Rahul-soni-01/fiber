<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblReportItem extends Model
{
    use HasFactory;
    protected $table = 'tbl_reports_items'; // Specify the table name if it's different from the model name

    protected $fillable = [
        'scid',
        'report_id',
        'sr_card',
        'amp_card',
        'volt_card',
        'watt_card',
    ];
    public function tbl_sub_category()
    {
        return $this->belongsTo(tbl_sub_category::class, 'scid', 'id'); 
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id');
    }
}
