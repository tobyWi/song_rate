<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    //Set number of users and admins to generate into users table in DB
    public function run()
    {
        //Create 1 admin and 20 users
        factory(App\User::class, 'admin', 1)->create();
        factory(App\User::class, 20)->create();
    }
}
