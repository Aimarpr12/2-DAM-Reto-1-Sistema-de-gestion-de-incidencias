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
        DB::table('comentarios')->insert([
            "text"=>"Hay muchas variaciones de los pasajes de Lorem Ipsum disponibles, pero la mayoría sufrió alteraciones en alguna manera, ya sea porque se le agregó humor, o palabras aleatorias que no parecen ni un poco creíbles. Si vas a utilizar un pasaje de Lorem Ipsum, necesitás estar seguro de que no hay nada avergonzante escondido en el medio del texto. Todos los generadores de Lorem Ipsum que se encuentran en Internet tienden a repetir trozos predefinidos cuando sea necesario, haciendo a este el único generador verdadero (válido) en la Internet. Usa un diccionario de mas de 200 palabras provenientes del latín, combinadas con estructuras muy útiles de sentencias, para generar texto de Lorem Ipsum que parezca razonable. Este Lorem Ipsu",
            "time"=> 45,
            "incidencia_id"=>2,
            "user_id"=>1,
            "created_at"=>now()
        ]);
    }
}
