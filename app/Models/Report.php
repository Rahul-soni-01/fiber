<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'tbl_reports';
    protected $fillable = [
        'worker_name',
        'sr_no_fiber',
        'm_j',
        'type',
        'sr_card',
        // 'sr_led',
        'sr_isolator',
        'sr_aom_qswitch',
        'amp_aom_qswitch',
        'volt_aom_qswitch',
        'watt_aom_qswitch',
        'sr_cavity_nani',
        'sr_cavity_moti',
        'sr_combiner_3_1',
        'amp_combiner_3_1',
        'volt_combiner_3_1',
        'watt_combiner_3_1',
        'sr_couplar_2_2',
        'amp_couplar_2_2',
        'volt_couplar_2_2',
        'watt_couplar_2_2',
        'sr_hr',
        'sr_fiber_nano',
        'sr_fiber_moto',
        'output_amp',
        'output_volt',
        'output_watt',
        'nani_cavity',
        'final_cavity',
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
        return $this->belongsTo(TblType::class, 'type', 'id');
    }

}
