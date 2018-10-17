<?php

use Faker\Generator as Faker;

$factory->define(App\Organizacion::class, function (Faker $faker) {
    return [
        'nombre' => $faker->company,
        'rut' => $faker->swiftBicNumber,
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->e164PhoneNumber,
        'actividad' => $faker->jobTitle,
        'descripcion' => $faker->jobTitle,
        'email' => $faker->unique()->safeEmail,
        //'speciality_id' => $faker->randomNumber(2),
    ];
});
