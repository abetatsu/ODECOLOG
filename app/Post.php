<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    protected $fillable = [
        'user_id', 'title', 'content', 'url', 'image_path', 'public_id',
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    public function likes()
    {
        return $this->belongsToMany('App\User', 'likes')->withTimestamps();
    }

    public function dislikes()
    {
        return $this->belongsToMany('App\User', 'dislikes')->withTimestamps();
    }

    public function getAbstruct()
    {
        return $content = Str::limit($this->content,150);
    }
}
