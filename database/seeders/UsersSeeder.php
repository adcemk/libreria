<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'administrador',
            'email' => 'administrador@test.com',
            'type' => 'Administrador',
            'password' => '12345678',
        ]);

        DB::table('users')->insert([
            'name' => 'usuario',
            'email' => 'usuario@test.com',
            'type' => 'Usuario',
            'password' => '12345678',
        ]);
    }
}
