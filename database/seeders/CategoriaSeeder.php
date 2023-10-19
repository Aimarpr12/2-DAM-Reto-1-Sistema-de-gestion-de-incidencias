<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            "name"=>"Elorrieta",
            "created_at"=>now(),
            ]);
        DB::table('categorias')->insert([
            "name"=>"Bilbao",
            "created_at"=>now(),
            ]);
        DB::table('categorias')->insert([
            "name"=>"Ventas",
            "created_at"=>now(),
            ]);
    }
}
