<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Song extends Model
{

    protected $fillable = ['title', 'creators', 'description', 'url', 'category_id', 'user_id'];

    public function Comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function User()
    {
        return $this->belongsTo(User::class);
    }

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }

    public function Vote()
    {
        return $this->hasMany(Vote::class);
    }

}
