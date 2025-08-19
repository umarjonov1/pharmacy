<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    const NOT_LIKED = 0;
    const LIKED = 1;

    protected $table = 'likes';
    protected $fillable = ['user_id', 'medicine_id', 'is_liked'];

    public function getStatusAttribute()
    {
        return $this->status == 0 ? 'not liked' : 'liked';
    }
}


