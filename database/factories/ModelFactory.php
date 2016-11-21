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

$factory->define('App\User', function (Faker\Generator $faker) {
    static $password;

    return [
        'first-name' => $faker->firstName,
        'last-name' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'address' => $faker->secondaryAddress,
        'phone' => '1165578099',
        'password' => '123456789a',
        'remember_token' => str_random(10),
    ];
});
$factory->define(App\Kid::class, function (Faker\Generator $faker) {
    return [
        'first-name' => $faker->firstName,
        'last-name' => $faker->lastName,
        'birthdate' => $faker->date($format = 'd-m-Y', $max = 'now'),
        'description' =>$faker->text,
        'profile-picture' =>$faker->imageUrl($width = 640, $height = 480),
    ];
});
$factory->define('App\School', function (Faker\Generator $faker) {
    return [
        'name' => $faker->country,
        'address' => $faker->secondaryAddress,
        'telephone' => '1165578099',
        'email' => $faker->email,
    ];
});
$factory->define(App\Room::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->city,
    ];
});
$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text,
    ];
});
$factory->define(App\PostType::class, function (Faker\Generator $faker) {
    return [
        'content' => $faker->text,
    ];
});
