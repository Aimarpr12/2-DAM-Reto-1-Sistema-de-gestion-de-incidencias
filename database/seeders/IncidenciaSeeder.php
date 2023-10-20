<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IncidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('incidencias')->insert([
            [
                'title' => 'Incidencia 1',
                'text' => 'Descripción: La aplicación web no carga correctamente en Internet Explorer. asokidsmkdasmldasmñldasmldasmldasmldasmçldasmç',
                'time' => 1588888888,
                'prioridad_id' => 1,
                'estado_id' => 1,
                'categoria_id' => 1,
                "created_at"=>now()
            ],
            [
                'title' => 'Incidencia 2',
                'text' => 'Incidencia 2',
                'time' => 1588888888,
                'prioridad_id' => 2,
                'estado_id' => 2,
                'categoria_id' => 2,
                "created_at"=>now()
            ]
            ]);

    }
}
