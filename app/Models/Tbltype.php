<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tbltype extends Model
{
    use HasFactory;

    protected $table = 'tbl_types';

    protected $fillable = ['name']; 

    public function reports() // Plural, since it's a hasMany relationship
    {
        return $this->hasMany(Report::class, 'type', 'id');
    }
}
