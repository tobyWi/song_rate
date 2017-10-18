<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

//Users-factory with 'is_admin' default = false
$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'is_admin' => false,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

//Admins-factory with 'is_admin' = true
$factory->defineAs(App\User::class, 'admin', function (Faker $faker) {
    return [
        'name' => 'Tobbe',
        'email' => 'tobias.wiklund@gmail.com',
        'is_admin' => true,
        'password' => bcrypt('123456'),
        'remember_token' => str_random(10),
    ];
});


//Song-factory 
$factory->define(App\Song::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
        'creators' => $faker->name,
        'description' => $faker->text(100),
        'url' => 'https://soundcloud.com/designobserver/sets/the-design-of-business-the',
        'category_id' => $faker->numberBetween(1,3),
        'user_id' => $faker->numberBetween(1,101)
    ];
});
