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
                'user_id' => 1,
                'prioridad_id' => 1,
                'estado_id' => 1,
                'categoria_id' => 1,
                'department_id' => 2,
                "created_at"=>now()
            ],
            [
                'title' => 'Incidencia 2',
                'text' => 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses ',
                'time' => 1588,
                'user_id' => 1,
                'prioridad_id' => 2,
                'estado_id' => 2,
                'categoria_id' => 2,
                'department_id' => 1,
                "created_at"=>now()
            ],
            [
                'title' => 'Incidencia 3',
                'text' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum',
                'time' => 18,
                'user_id' => 2,
                'prioridad_id' => 3,
                'estado_id' => 3,
                'categoria_id' => 1,
                'department_id' => 2,
                "created_at"=>now()
            ]
            ]);

    }
}
