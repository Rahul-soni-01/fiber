<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    protected $table = 'tbl_report';
    protected $fillable = [
        'date',
        'sr_no',
        'item',
        'card',
        'led_45',
        'led_15',
        'led_30',
        'isolator',
        'aom_qswitch',
        'cavity_nani',
        'cavity_moti',
        'combiner_3x1',
        'couplar_2x2',
        'hr',
        'fiber_nano',
        'fiber_moto',
        'test',
        'nani_cavity',
        'final_cavity'
    ];
}
