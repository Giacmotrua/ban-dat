<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permissions extends Model
{
    use HasFactory;

    protected $table = 'permissions';
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public function roles()
    {
        return $this->belongsToMany(Roles::class, 'role_permission', 'permission_id', 'role_id');
    }
}
