<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblAccTransaction extends Model
{
    use HasFactory;

    protected $table = 'tbl_acc_transaction';

    protected $fillable = [
        'vid',
        'fyear',
        'VNo',
        'Vtype',
        'VDate',
        'COAID',
        'Narration',
        'chequeNo',
        'chequeDate',
        'ledgerComment',
        'Debit',
        'Credit',
        'IsAppove',
        'RevCodde',
    ];
}
