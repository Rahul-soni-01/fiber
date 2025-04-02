<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblVoucher extends Model
{
    use HasFactory;
    protected $table = 'tbl_acc_vaucher';
    protected $fillable = [
        'fyear',
        'VNo',
        'Vtype',
        'referenceNo',
        'VDate',
        'COAID',
        'Narration',
        'ledgerComment',
        'Debit',
        'Credit',
        'RevCodde',
        'isApproved',
        'approvedBy',
        'approvedDate',
        'isyearClosed',
    ];

    // Specify the attributes that should be cast
    protected $casts = [
        'VDate' => 'date',
        'approvedDate' => 'datetime',
        'Debit' => 'decimal:2',
        'Credit' => 'decimal:2',
        'isApproved' => 'boolean',
        'isyearClosed' => 'boolean',
    ];

    // Define relationships if needed
   /* public function approvedByUser()
    {
        return $this->belongsTo(User::class, 'approvedBy');
    }

    public function coa()
    {
        return $this->belongsTo(TblAccCoa::class, 'COAID');
    }*/
}
