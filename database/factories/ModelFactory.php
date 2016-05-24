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

$factory->define(ConstruLink\Models\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(ConstruLink\Models\Category::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->word
    ];
});

$factory->define(ConstruLink\Models\Product::class, function(Faker\Generator $faker){
    return [
        'name' => $faker->word
        , 'description' => $faker->sentence
        , 'price' => $faker->numberBetween(10, 50)
    ];
});

$factory->define(ConstruLink\Models\Client::class, function(Faker\Generator $faker){
    return [
        'phone' => $faker->phoneNumber
        , 'address' => $faker->address
        , 'city' => $faker->city
        , 'state' => $faker->state
        , 'zipcode' => $faker->postcode
    ];
});