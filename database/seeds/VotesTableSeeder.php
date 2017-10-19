<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    //Set number of votes to generate into votes table in DB
    public function run()
    {
        factory(App\Vote::class, 400)->create();
    }
}
