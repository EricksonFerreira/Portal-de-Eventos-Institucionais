<?php

use Faker\Generator as Faker;
use App\Atividade;
use App\Evento;
use App\Palestrante;

$factory->define(App\Atividade::class, function (Faker $faker) {
    $date = $faker->date('Y-m-d');
	return [
        'evento_id' => Evento::where(['campus' => 'igarassu'])->get()->random()->id,
        'palestrante_id' => function () {
        	return factory(App\Palestrante::class)->create()->id;
        },
        'titulo' => $faker->word,
        'data' => $date,
        'hora_inicio' => '08:00',
        'hora_fim' => '16:00'
    ];
});
