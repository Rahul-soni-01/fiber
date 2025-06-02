<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_user;

class Permission extends Model
{
    use HasFactory;
    protected $table = 'permissions';

    // Define the fillable fields to allow mass assignment
    protected $fillable = [
        'name',
    ];

    public function users()
    {
        return $this->belongsToMany(tbl_user::class);
    }
}
