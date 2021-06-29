<?php

namespace Database\Seeders;

use App\Models\Publisher;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('publishers')->insert([
            'nombre' => 'Publicador1',
            'telefono' => 'xxxxxxxxx',
            'pais' => 'Pais1',
            'ciudad' => 'Ciudad1',
            'email' => 'email1.@gmail.com',
        ]);

        DB::table('publishers')->insert([
            'nombre' => 'Publicador2',
            'telefono' => 'xxxxxxxxx',
            'pais' => 'Pais2',
            'ciudad' => 'Ciudad2',
            'email' => 'email2.@gmail.com',
        ]);

        Publisher::create([
            'nombre' => 'Publicador3',
            'telefono' => 'xxxxxxxxx',
            'pais' => 'Pais3',
            'ciudad' => 'Ciudad3',
            'email' => 'email3.@gmail.com',
        ]);
    }
}
