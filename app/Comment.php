<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    public function users()
    {
        return$this->belongsTo(User::class);
    }

    public function recipes()
    {
        return$this->belongsTo(Recipe::class);
    }
}
