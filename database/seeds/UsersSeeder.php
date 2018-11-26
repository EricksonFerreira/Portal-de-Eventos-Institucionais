<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(App\User::class, 50)->create()->each(function ($user) {
            // $user->posts()->save(factory(App\Post::class)->make());
        });
        DB::table('users')->insert([
            'name' => 'admin',
            'cpf' => '11111111111',
            'telefone' => '999999999',
            'email' => 'admin@pei.ifpe',
            'password' => bcrypt('admin'),
            'role' => 'manager'
        ]);
    }
}
