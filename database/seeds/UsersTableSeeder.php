<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Create the users and admins
        factory(App\User::class, 'admin', 1)->create();
        factory(App\User::class, 20)->create();
    }
}
