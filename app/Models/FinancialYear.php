<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    // Table name
    protected $table = 'tbl_acc_financial_years';

    // Primary key (optional, Laravel assumes 'id' by default)
    protected $primaryKey = 'id';

    // Mass assignable fields
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
        'is_active',
    ];

    // Cast 'is_active' as integer (0 or 1)
    protected $casts = [
        'is_active' => 'integer',
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    // If you want to disable Laravel's auto-timestamps:
    // public $timestamps = false;
}
