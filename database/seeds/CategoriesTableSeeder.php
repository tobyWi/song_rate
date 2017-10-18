<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
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
