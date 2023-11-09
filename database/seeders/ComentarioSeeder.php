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
            "text"=>"how about using piwik?

            install piwik
            create a site in it to get the tag needed
            add the code needed to a file, have that file included in mantis",

            "time"=>54,
            "incidencia_id"=>2,
            "user_id"=>2,
            "created_at"=>now()

            ]);
        DB::table('comentarios')->insert([
            "text"=>"In my opinion the ON/OFF-Flag (similar to jpgraph implemenation) would be a good solution.I have no prefered pdf-library. I think it's not critical because the pdf-document normally contains plain text with some boxes. It should look like the Word-Docoment. A table of contents with document-internal-links at the beginning of the pdf would be nice for later implementations." ,
            "time"=> 12,
            "incidencia_id"=>3,
            "user_id"=>2,
            "created_at"=>now()

        ]);
        DB::table('comentarios')->insert([
            "text"=>"Yes, I think we should use something without dependencies on a PHP module.

            I've tried some classes to generate pdf and fpdf is a very good solution.
            It's easy to create a pdf which looks like the Word output.",
            "time"=> 45,
            "incidencia_id"=>3,
            "user_id"=>1,
            "created_at"=>now()
        ]);
    }
}
