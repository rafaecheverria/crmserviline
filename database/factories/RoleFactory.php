<?php

use Faker\Generator as Faker;

/* @var Illuminate\Database\Eloquent\Factory $factory */

$factory->define(App\Role::class, function (Faker $faker) {
	
	return [
        'name' => $faker->name,
        'display_name' => $faker->name,
        'description' => $faker->sentence,
    ];

});	
