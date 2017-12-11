<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'nombres' => $faker->name,
        'rut' => $faker->swiftBicNumber,
        'apellidos' => $faker->lastName,
        'direccion' => $faker->streetAddress,
        'telefono' => $faker->e164PhoneNumber,
        'actividad' => $faker->jobTitle,
        'diagnostico' => $faker->jobTitle,
        'descripcion' => $faker->jobTitle,
        'titulo' => $faker->jobTitle,
        'speciality_id' => rand(1,7),
        'estudios_complementarios' => $faker->jobTitle,
        'posicion' => $faker->jobTitle,
        'nacimiento' => $faker->date,
        'fecha_admision' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
