<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
     protected $fillable = ['title','body','user_id']; 
    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function images()
    {
        return $this->hasMany('App\Image');
    }
    public function tags()
    {
        return $this->hasMany('App\Tag');
    }
}