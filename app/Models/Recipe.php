<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name', 'description', 'products', 'recipe'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
