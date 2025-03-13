<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tbl_user;
use App\Models\Department;
use App\Models\Permission;

class ManagePermission extends Model
{
    use HasFactory;
    protected $table = 'manage_permission';

    // Define fillable fields to allow mass assignment
    protected $fillable = [
        'uid', // User ID
        'd_id', // JSON encoded department IDs
        'p_id', // JSON encoded permission IDs
    ];

    protected $casts = [
        'd_id' => 'array',
        'p_id' => 'array',
    ];

    // Relationship with the tbl_user (User) model
    public function user()
    {
        return $this->belongsTo(tbl_user::class, 'uid');
    }
    public function departments()
    {
        $departmentIds = collect($this->d_id)->flatten()->unique()->toArray();
        
        return Department::whereIn('id', $departmentIds)->get();
    }

    public function permissions()
    {
        $permissionIds = collect($this->p_id)->flatten()->unique()->toArray();
        
        return Permission::whereIn('id', $permissionIds)->get();
    }
}
