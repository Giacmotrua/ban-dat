<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $fillable = [
        'code_order',
        'name',
        'phone',
        'email',
        'address',
        'quantity',
        'money',
        'status',
        'note',
        'order_detail'
    ];

    public function scopeCheckSearch($query, $keyword)
    {
        return $keyword ? $query->where('code_order', 'LIKE', '%'.$keyword.'%') : null;
    }
}
