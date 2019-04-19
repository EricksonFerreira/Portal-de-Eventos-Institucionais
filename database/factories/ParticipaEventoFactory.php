<?php

use Faker\Generator as Faker;
use App\User;
use App\Evento;

$factory->define(App\ParticiparEvento::class, function (Faker $faker) {
	$event = Evento::get()->random();
    $date = $faker->dateTimeBetween($event->inicio_evento, $event->fim_evento);
    return [
    	'user_id' 	=> User::where(['role' => 'participante'])->get()->random()->id,
    	'evento_id' => Evento::get()->random()->id,
    	'checking' => $faker->randomElement([0,1]),
        'created_at' => $date, 
        'updated_at' => $faker->dateTimeBetween($date, $event->fim_evento),
    ];
});
