<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $table= 'categories';
    protected $fillable = [
        'name',
        'slug',
        'type'
    ];

    public function product() {
        return $this->hasMany(Products::class, 'category_id');
    }

    public function scopeCheckSearch($query, $keyword)
    {
        return $keyword ? $query->where('name', 'LIKE', '%'.$keyword.'%') : null;
    }
}
