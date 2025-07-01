<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblLed extends Model
{
    use HasFactory;
    protected $table = 'tbl_leds';

    // Specify the fillable attributes for mass assignment
    protected $fillable = [
        'scid',
        'report_id',
        'sr_led',
        'amp_led',
        'volt_led',
        'watt_led',
    ];
    public function tbl_sub_category()
    {
        return $this->belongsTo(tbl_sub_category::class, 'scid', 'id'); 
    }
    public function report()
    {
        return $this->belongsTo(Report::class, 'report_id', 'id'); // Adjust foreign key and local key as needed
    }
}
