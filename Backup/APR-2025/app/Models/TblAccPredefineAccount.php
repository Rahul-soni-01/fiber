<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TblAccPredefineAccount extends Model
{
    use HasFactory;

    protected $table = 'tbl_acc_predefine_account';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cashCode',
        'bankCode',
        'advance',
        'fixedAsset',
        'purchaseCode',
        'salesCode',
        'serviceCode',
        'customerCode',
        'supplierCode',
        'costs_of_good_solds',
        'vat',
        'tax',
        'inventoryCode',
        'CPLCode',
        'LPLCode',
        'salary_code',
        'emp_npf_contribution',
        'empr_npf_contribution',
        'emp_icf_contribution',
        'empr_icf_contribution',
        'prov_state_tax',
        'state_tax',
        'prov_npfcode',
    ];
}
