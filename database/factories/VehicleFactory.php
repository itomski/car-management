<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Vehicle;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Vehicle::class, function (Faker $faker) {

    return [
        'brand' => $faker->randomElement(['Ford', 'Fiat', 'Volvo', 'VW', 'Renault', 'BMW', 'Audi']),
        'type' => $faker->randomElement(['TT', 'Panda', 'V70', 'ID6', '7er', 'Zoe', 'Ka']),
        'registration' => $faker->randomElement(['FR', 'HB', 'CB', 'B']).'-'.strtoupper(Str::random(3)).$faker->numberBetween(90, 999),
        'description' => $faker->text,
        'category' => $faker->randomElement(['Kleinwagen', 'Mittelklasse', 'Oberklasse', 'VIP-Car']),
        'img' => $faker->randomElement(['AMG_C63.jpeg', 'AMG_GT.jpeg', 'Audi_RS_Q8.jpeg', 'Audi_RS7_Sportback.jpeg', 'ferrari_458.jpeg', 'lambo_gambo.jpeg', 'lamborghini_urus.jpeg', 'maserati_ghibli.jpeg']),
        'status' => $faker->randomElement(['active', 'blocked']),
    ];
});

