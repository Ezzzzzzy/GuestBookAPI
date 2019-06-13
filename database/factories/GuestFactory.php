<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Guest;
use Faker\Generator as Faker;

$factory->define(Guest::class, function (Faker $faker) {
    return [
        'first_name' => $faker->firstName,
        'last_name' => $faker->lastName,
        'email' => $faker->email,
        'number' => $faker->e164PhoneNumber,
        'gender' => $faker->randomElement($array = array ('Male','Female',)),
        'Address' => $faker->address 
    ];
});
