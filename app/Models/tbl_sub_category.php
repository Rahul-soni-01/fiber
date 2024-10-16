<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sub_category extends Model
{
    use HasFactory;
    protected $table = "tbl_sub_categories";

    public function category()
    {
        return $this->belongsTo(tbl_category::class, 'cid', 'id'); // Adjust foreign key and local key as needed
    }
}
