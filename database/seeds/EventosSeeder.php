<?php

use Faker\Generator as Faker;
use Faker\Provider\DateTime as DateTimeProvider;
use Illuminate\Database\Seeder;
use App\User;

class EventosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\Evento::class, 10)->create()->each(function ($evento) {
            factory(App\Palestrante::class, 5)->create([
                'evento_id' => $evento->id
            ])->each(function($palestrante) use ($evento) {
                factory(App\Atividade::class, 2)->create([
                    'evento_id' => $evento->id,
                    'palestrante_id' => $palestrante->id
                ]);
            });
        });
        factory(App\Evento::class, 10)
            ->create([
                'user_id' => User::where(['email' => 'admin@pei.ifpe'])->get()->first()->id,
            ])
            ->each(function ($evento) {
                factory(App\Palestrante::class, 5)->create([
                    'evento_id' => $evento->id
                ])->each(function($palestrante) use ($evento) {
                    $faker = new Faker();
                    $faker->addProvider(new DateTimeProvider($faker));
                    $date = $faker->dateTimeBetween($evento->inicio_evento, $evento->fim_evento);

                    factory(App\Atividade::class, 1)->create([
                        'evento_id' => $evento->id,
                        'palestrante_id' => $palestrante->id,
                        'hora_inicio' => $date,
                        'hora_fim' => $faker->dateTimeBetween($date, $evento->fim_evento)
                    ]);
                });
            });
    }
}
