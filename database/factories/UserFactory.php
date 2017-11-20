<?php

use Faker\Generator as Faker;

$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'rut' => $faker->swiftBicNumber,
        'last_name' => $faker->lastName,
        'address' => $faker->streetAddress,
        'phone' => $faker->e164PhoneNumber,
        'activity' => $faker->jobTitle,
        'diagnosis' => $faker->jobTitle,
        'description' => $faker->jobTitle,
        'title' => $faker->jobTitle,
        'speciality_id' => rand(1,7),
        'complementary_studies' => $faker->jobTitle,
        'position' => $faker->jobTitle,
        'birth_date' => $faker->date,
        'admission_date' => $faker->date,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});
