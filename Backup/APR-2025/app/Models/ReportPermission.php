<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportPermission extends Model
{
    protected $table = 'tbl_report_permission';

    protected $fillable = [
        'user_type',
        'field_name',
    ];

    protected $casts = [
        'field_name' => 'array', // Automatically handles JSON casting
    ];
}

