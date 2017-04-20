<?php

use Faker\Generator;
use App\Models\Access\User\User;
use App\Models\SeguimientoOdeco\SeguimientoOdeco;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(User::class, function (Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(SeguimientoOdeco::class, function (Generator $faker) {

    return [
        'odeco_id' => 1,
        'descripcion' => $faker->name,
        'estado' => '1',
        'archivo' => 'archivoarchivoarchivo',
    ];
});