<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $fillable = ['body', 'user_id', 'song_id'];
    
    public function Song()
    {
        return $this->belongsTo(Song::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }
}
