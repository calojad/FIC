<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Cliente::class, function (Faker $faker) {
    return [
        'cedula' => $faker->unique()->numerify('##########'),
        'razon_social' => $faker->name,
        'nombres' => $faker->name,
        'apellidos' => $faker->lastName,
        'telefono' => $faker->numerify('###-###-####'),
        'email' => $faker->email,
        'direccion' => $faker->address,
    ];
});
