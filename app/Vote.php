<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $fillable = ['song_id', 'user_id', 'vote_value'];

    public function User() {
        return $this->belongsTo(User::class);
    }

    public function Song() {
        return $this->belongsTo(Song::class);
    }

}
