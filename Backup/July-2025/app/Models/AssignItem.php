<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignItem extends Model
{
    use HasFactory;

    protected $table = 'assign_items';

    protected $fillable = [
        'temp',
        'sr_no_fiber',
        // 'cid',
        'scid',
        'qty',
        'sr_no',
        'emp',
    ];

    public function SubCategory()
    {
        return $this->belongsTo(tbl_sub_category::class, 'scid', 'id'); 
    }
}
