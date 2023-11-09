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
                'title' => 'Security - User-Logging',
                'text' => 'Some kind of user-logging would be nice, e.g.

                User XYZ added bug
                User XYZ changed bug
                user XYZ changed user settings

                and so on. Some nice people played around at my site, added themself as user, then changed the user name and their e-mail to bill.gates@microsoft.com or other strange entries.

                It would be nice to be able to track it down at the original login (e-mail address). One additional possibility would IMO be to send a new generated password when someone enters a new e-mail-address in their user-settings.',

                'time' => 1588888888,
                'user_id' => 1,
                'prioridad_id' => 1,
                'estado_id' => 1,
                'categoria_id' => 3,
                'department_id' => 1,
                "created_at"=>now()
            ],
            [
                'title' => 'User management',
                'text' => '
                In our company we would like to be able to monitor the use of our Mantis installation a bit more.
                We would like to be able to see when users have logged in and how many times. To see which projects they are looking at and so on.
                We are also looking for at e-mail function to mail all users or a group of users.
                Is any features of this kind planed ? ',

                'time' => 1588,
                'user_id' => 2,
                'prioridad_id' => 2,
                'estado_id' => 2,
                'categoria_id' => 2,
                'department_id' => 2,
                "created_at"=>now()
            ],
            [
                'title' => 'Report in PDF',
                'text' => 'I would like to export the Data shown in "Main-Menu"->"View Issues"->"Print Reports" in PDF-Format instead of Word or Excel.',
                'time' => 18,
                'user_id' =>3,
                'prioridad_id' => 3,
                'estado_id' => 3,
                'categoria_id' => 3,
                'department_id' => 3,
                "created_at"=>now()
            ]
            ]);

    }
}
