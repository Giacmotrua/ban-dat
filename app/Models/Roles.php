<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roles extends Model
{
    use HasFactory;

    protected $table = 'roles';
    protected $fillable = [
        'name',
        'display_name',
        'description'
    ];

    public function user()
    {
        return $this->belongsToMany(User::class, 'role_user', 'role_id', 'user_id');
    }

    public function permission()
    {
        return $this->belongsToMany(Permissions::class, 'role_permission', 'role_id', 'permission_id');
    }

    public function scopeCheckSearch($query, $keyword)
    {
        return $keyword ? $query->where('display_name', 'LIKE', '%'.$keyword."%") : null;
    }
}
