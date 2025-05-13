<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'tbl_reports';
    protected $fillable = [
        'indate',
        'worker_name',
        'sr_no_fiber',
        'm_j',
        'type',
        'section',
        'note1',
        'note2',
        'remark',
        'status',
        'part',
        'temp',
        'r_status',
        'f_status',
        'party_name',
        'sale_status',
        'stock_status',
        'final_amount',
        'extra_line',
        'outdate',
    ];

    public function tbl_leds()
    {
        return $this->hasMany(TblLed::class, 'report_id', 'id');
    }

    public function tbl_cards()
    {
        return $this->hasMany(TblCard::class, 'report_id', 'id');
    }
    public function tbl_type() // Singular, since it's a belongsTo relationship
    {
        return $this->belongsTo(Tbltype::class, 'type', 'id');
    }

    public function reportItems()
    {
        return $this->hasMany(TblReportItem::class, 'report_id', 'id');
    }
}
