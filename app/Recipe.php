<?php

namespace App;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name', 'description', 'products', 'recipe', 'user_id'];

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addImage(Request $request)
    {
        if(!$request->hasFile('picture')) {
            return false;
        }

        $recipePictureName = $this->id.'_picture'.time().'.'.request()->picture->getClientOriginalExtension();

        $request->picture->storeAs('pictures',  $recipePictureName);

        $this->picture = $recipePictureName;
        $this->save();

        return true;
    }

    public function getPathToImage()
    {
        $root = '/storage/pictures/';
        return isset($this->picture) ? $root.$this->picture : 'picture';
    }

}
