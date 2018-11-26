<?php

use Illuminate\Database\Seeder;

class AtividadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\Atividade::class, 25)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
        });
    }
}
