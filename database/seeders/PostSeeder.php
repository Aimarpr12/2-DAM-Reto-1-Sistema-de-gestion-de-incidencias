<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('department')->insert([
            "name"=>"Elorrieta",
            "created_at"=>now(),
            ]);
        DB::table('categoria')->insert([
            "name"=>"Elorrieta",
            "created_at"=>now(),
            ]);
            
    }
}
