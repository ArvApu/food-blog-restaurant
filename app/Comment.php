<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'text','user_id', 'recipe_id'
    ];

    public function users()
    {
        return$this->belongsTo(User::class);
    }

    public function recipes()
    {
        return$this->belongsTo(Recipe::class);
    }
}
