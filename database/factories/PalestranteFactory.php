<?php

use Faker\Generator as Faker;
use App\User;
use App\Evento;

$factory->define(App\Palestrante::class, function (Faker $faker) {
    return [
    	'user_id' 	=> User::where(['role' => 'participante'])->get()->random()->id,
    	'evento_id' => Evento::get()->random()->id,
    	'nome' => $faker->name,
			'descricao' => $faker->paragraph
    ];
});