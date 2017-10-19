<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    
    //Create three default genres into categories table
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Pop',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Rock',
                'created_at' => now(),
                'updated_at' => now(),

            ],
            [
                'name' => 'Soul',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
