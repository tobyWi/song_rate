<?php

use Faker\Generator as Faker;


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
        'user_id' => $faker->numberBetween(1,21)
    ];
});

//Comment-factory
$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
        'user_id' => $faker->numberBetween(1,21),
        'song_id' => $faker->numberBetween(1,100)
    ];
});

//Vote factory
$factory->define(App\Vote::class, function (Faker $faker) {
    return [
        'song_id' => $faker->numberBetween(1,100),
        'user_id' => $faker->numberBetween(2,21),
        'song_id' => $faker->numberBetween(1,100),
        'vote_value' => $faker->randomElement($array = [-1, 1]),
    ];
});


