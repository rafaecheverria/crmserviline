<?php

use Faker\Generator as Faker;

$factory->define(App\Unity::class, function (Faker $faker) {
    return [
        'nombre' => $faker->name,
        'telefono' => $faker->e164PhoneNumber,
        'email' => $faker->email,
        'direccion' => $faker->address,
        'region' => $faker->city,
        'ciudad' => $faker->city,
    ];
});
