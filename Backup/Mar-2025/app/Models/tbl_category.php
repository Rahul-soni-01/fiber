<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_category extends Model
{
    use HasFactory;
    protected $table = "tbl_categories";

    public function subCategories()
    {
        return $this->hasMany(tbl_sub_category::class, 'cid', 'id');
    }
}
