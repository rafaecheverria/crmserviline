<?php

use Faker\Generator as Faker;

$factory->define(App\Unity::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
    ];
});
