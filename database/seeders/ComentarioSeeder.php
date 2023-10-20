<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComentarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('comentarios')->insert([
            "text"=>"Estoy experimentando el mismo problema en Internet Explorer. Parece ser un problema de compatibilidad del sitio web con ese navegador. ¿Alguien más ha tenido este problema?",
            "time"=>54,
            "incidencia_id"=>1,
            "user_id"=>1,
            "created_at"=>now()

            ]);
        DB::table('comentarios')->insert([
            "text"=>"Sí, yo también he encontrado este problema. Es importante que resolvamos esta cuestión de compatibilidad con Internet Explorer lo antes posible para garantizar una experiencia óptima para nuestros usuarios.",
            "time"=> 12,
            "incidencia_id"=>1,
            "user_id"=>2,
            "created_at"=>now()

        ]);
    }
}
