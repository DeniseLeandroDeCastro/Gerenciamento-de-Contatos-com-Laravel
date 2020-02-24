<?php

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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Contato::class, function (Faker\Generator $faker) {
    return [
        'nome' => $faker->name, //Gera nomes aleatórios
        'email' => $faker->safeEmail, //Gera emails
        'endereco' => $faker->streetaddress, //Gera endereços
    ];
});

$factory->define(App\Telefone::class, function (Faker\Generator $faker) {
    return [
        'titulo' => $faker->name, 
        'telefone' => $faker->phoneNumber,
    ];
});