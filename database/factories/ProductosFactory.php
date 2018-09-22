<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Producto::class, function (Faker $faker) {
    return [
        'codigo' => $faker->unique()->ean8,
        'nombre' => $faker->firstName,
        'costo' => $faker->randomFloat(3,0,100),
        'precio' => $faker->randomFloat(3,50,150),
        'stock' => $faker->randomNumber(3),
    ];
});
