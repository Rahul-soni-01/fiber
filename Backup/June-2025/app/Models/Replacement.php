<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Replacement extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'sale_id',
        'old_item_id',
        'new_item_id',
        'date',
        'old_sr_no',
        'new_sr_no',
        'note',
    ];

    protected $casts = [
        'date' => 'date'
    ];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function item()
    {
        return $this->belongsTo(SaleItem::class, 'item_id');
    }
}
