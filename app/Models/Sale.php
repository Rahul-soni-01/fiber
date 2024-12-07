<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'tbl_sales';

    // Specify the fillable fields
    protected $fillable = [
        'sale_id',
        'customer_id',
        'total_amount',
        'sale_date',
        'notes',
    ];

    /**
     * Relationship: One Sale can have many Sale Items.
     */
    public function items()
    {
        return $this->hasMany(SaleItem::class, 'sale_id', 'id');
    }

    public function customer()
    {
        return $this->belongsTo(TblCustomer::class, 'customer_id', 'id'); // 'customer_id' is the foreign key in tbl_sales, and 'id' is the primary key in tbl_customers
    }
}
