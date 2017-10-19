<?php

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{
    
    //Set number of comments to generate into comments table in DB
    public function run()
    {
        factory(App\Comment::class, 250)->create();
    }
}
