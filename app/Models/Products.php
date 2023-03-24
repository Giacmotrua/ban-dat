<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $table= 'products';
    protected $fillable = [
        'name',
        'slug',
        'price',
        'in_stock',
        'description',
        'image',
        'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function scopeWithPrice($query, $type)
    {
        return $type ? $query->orderBy('price', $type) : null;
    }

    public function scopeWithType($query, $type)
    {
        return $query->whereHas('category', function ($query) use ($type) {
            $query->where('type', $type);
        });
    }

    public function scopeCheckSearch($query, $keyword)
    {
        return $keyword ? $query->where('name', 'LIKE', '%'.$keyword.'%') : null;
    }
}
