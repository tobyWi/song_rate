<?php

use Illuminate\Database\Seeder;

class SongsTableSeeder extends Seeder
{
    //Set number of songs to generate into songs table in DB
    public function run()
    {
        factory(App\Song::class, 100)->create();
    }
}
