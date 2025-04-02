<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use App\Models\Department;

class tbl_user extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;
    public $table = "tbl_users";

    protected $fillable = [
        'name',
        'email',
        'password',
        'type',
        'd_id',
    ];

    protected $hidden = [
        'password',
    ];

    public function department()
    {
        return $this->belongsTo(Department::class, 'd_id');
    }
}
