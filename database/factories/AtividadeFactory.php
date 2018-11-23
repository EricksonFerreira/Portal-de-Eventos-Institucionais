<?php

use Faker\Generator as Faker;
use App\Atividade;
use App\Evento;
use App\Palestrante;

$factory->define(App\Atividade::class, function (Faker $faker) {
    $date = $faker->date('Y-m-d');
	return [
        'evento_id' => Evento::where(['campus' => 'igarassu'])->get()->random()->id,

        'palestraste_id' => Palestrante::get()->random()->id,
        'titulo' => $faker->word,
        'descricao' => $faker->paragraph,
        'data' => $date,
        'hora_inicio' => '08:00',
        'hora_fim' => '16:00'
    ];
});
