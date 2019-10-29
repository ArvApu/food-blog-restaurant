<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text','user_id', 'recipe_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function recipes()
    {
        return $this->belongsTo(Recipe::class, 'recipe_id');
    }
}
