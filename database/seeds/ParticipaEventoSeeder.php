<?php

use Illuminate\Database\Seeder;

class ParticipaEventoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\ParticiparEvento::class, 80)->create()->each(function ($user) {
        });    }
}
