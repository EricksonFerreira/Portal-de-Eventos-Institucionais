<?php

use Faker\Generator as Faker;
use App\Atividade;
use App\Evento;
use App\Palestrante;

$factory->define(App\Atividade::class, function (Faker $faker) {
// $date = $faker->date('Y-m-d');
    $event = Evento::get()->random();
    $date = $faker->dateTimeBetween($event->inicio_evento, $event->fim_evento);
	return [
        'evento_id' => $event->id,
        'palestrante_id' => Palestrante::get()->random()->id,
        'titulo' => $faker->word,
        'descricao' => $faker->paragraph,
        'confirmacao' => $faker->boolean,
        // 'hora_inicio' => '08:00',
        'hora_inicio' => $date,
        'hora_fim' => $faker->dateTimeBetween($date, $event->fim_evento)
    ];
});
