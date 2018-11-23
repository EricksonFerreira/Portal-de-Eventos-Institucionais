<?php

use Faker\Generator as Faker;
use App\User;

$factory->define(App\Evento::class, function (Faker $faker) {
    $date = $faker->date('Y-m-d');
    return [
        'user_id' => User::where(['role' => 'manager'])->get()->random()->id,
        'nome' => 'joao',
        'descricao' => $faker->paragraph,
        'campus' => $faker->randomElement(['abreu', 'afogados', 'barreiros', 'belojardim', 'igarassu', 'recife']),
        'email' => $faker->email,
        'telefone' => $faker->phoneNumber,
        'imagem' => null,
        'vagas' => $faker->numberBetween(100, 500),
        'inicio_evento' => $date,
        'hora_inicio' => '08:00',
        'fim_evento' => $date,
        'hora_fim' => '16:00'
    ];
});
