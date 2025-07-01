<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblBank extends Model
{
    use HasFactory;
    protected $table = 'tbl_bank';
    protected $fillable = [
        'HeadCode',
        'bank_name',
        'branch',
        'account_type',
        'account_number',
        'ifsc_code',
        'account_holder_name',
        'opening_balance',
    ];
}
