<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected $fillable = ['comment', 'user_id', 'medicine_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
