<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    protected $guarded = ['id'];

    public function scopeSearch($query, $value)
    {
        $query->where('title', 'ilike', "%{$value}%")
            ->orWhere('content', 'ilike', "%{$value}%");
    }
}
