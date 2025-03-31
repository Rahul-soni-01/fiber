<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Replacement extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'sale_id',
        'item_id',
        'date',
        'old_sr_no',
        'new_sr_no',
        'note',
        'user_id'
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
