<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_purchase extends Model
{
    use HasFactory;
    protected $table = "tbl_purchases";

    public function party()
    {
        return $this->belongsTo(tbl_party::class, 'pid', 'id');
    }
      public function Items()
    {
        return $this->hasMany(tbl_purchase_item::class, 'invoice_no', 'id');
    }
}

