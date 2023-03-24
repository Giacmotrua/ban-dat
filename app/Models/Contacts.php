<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contacts extends Model
{
    use HasFactory;
    protected $table = 'contacts';
    protected $fillable = [
      'name',
      'email',
      'message'
    ];

    public function scopeCheckSearch($query, $keyword)
    {
        return $keyword ? $query->where('name', 'LIKE', '%'.$keyword."%")->orWhere('email', 'LIKE', '%'.$keyword.'%') : null;
    }
}
