<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_party extends Model
{
    use HasFactory;
    protected $table = "tbl_parties";

    public function payments()
    {
        return $this->hasMany(TblPayment::class, 'supplier_id');
    }

    public function purchase()
    {
        return $this->hasMany(tbl_purchase::class, 'pid');
    }
    public function TblPurchaseReturn()
    {
        return $this->hasMany(tbl_purchase::class, 'p_id');
    }

}
