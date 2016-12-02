<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->secondaryAddress,
        'phone' => '1165578099',
        'profilePicture' => 'images/users/avatars/default_avatar_'.rand(0,20).'.svg',
        'password' =>  bcrypt('123456789a'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\School::class, function (Faker\Generator $faker) {
  return [
    'name' => $faker->country,
    'address' => $faker->secondaryAddress,
    'telephone' => '1165578099',
    'email' => $faker->email,
    'user_id' => App\User::all()->random()->id,
  ];
});

$factory->define(App\Kid::class, function (Faker\Generator $faker) {
    return [
        'firstName' => $faker->firstName,
        'lastName' => $faker->lastName,
        'birthdate' => $faker->date($format = 'd-m-Y', $max = 'now'),
        'description' => $faker->text,
        'profilePicture' => $faker->imageUrl($width = 640, $height = 480),
        'school_id' => App\School::all()->random()->id,
    ];
});

$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
        'school_id' => App\School::all()->random()->id,
        'profilePicture' => $faker->imageUrl($width = 640, $height = 480),
    ];
});

$factory->define(App\Posttype::class, function (Faker\Generator $faker) {
  return [
    'type' => $faker->word,
    'icon' => $faker->imageUrl($width = 50, $height = 50),
  ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'contentText' => $faker->text,
        'postType_id' => 1,
        'user_id' => App\User::all()->random()->id,
        'school_id' => App\School::all()->random()->id,
        'room_id' => App\Room::all()->random()->id,
        'postType_id' => App\Posttype::all()->random()->id,
    ];
});
