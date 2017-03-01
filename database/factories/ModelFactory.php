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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Models\Author::class, function (Faker\Generator $faker) {
  return [
    'uuid'      => $faker->uuid,
    'firstname' => $faker->firstName,
    'lastname'  => $faker->lastName
  ];
});


$factory->define(\App\Models\Publisher::class, function( Faker\Generator $faker) {
  return [
    'uuid'  => $faker->uuid,
    'name'  => $faker->name
  ];
});


$factory->define(\App\Models\Book::class, function( \Faker\Generator $faker) {
  return [
    'title'       => $faker->title,
    'description' => $faker->text,
    'coverurl'    => $faker->imageUrl(),
    'isbn'        => $faker->isbn10,
    'publisher_id'=> $faker->randomNumber(2),
    'author_id'   => $faker->randomNumber(2),
    'highlighted' => rand(0,1)
  ];
});