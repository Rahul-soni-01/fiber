<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblAccCoa extends Model
{
    use HasFactory;

    // Table Name
    protected $table = 'tbl_acc_coa';

    // Fillable Fields
    protected $fillable = [
        'HeadCode',
        'HeadName',
        'PHeadName',
        'PHeadCode',
        'HeadLevel',
    ];
}
