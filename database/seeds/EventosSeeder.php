<?php

use Illuminate\Database\Seeder;

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
        factory(App\Evento::class, 10)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
        });
    }
}
