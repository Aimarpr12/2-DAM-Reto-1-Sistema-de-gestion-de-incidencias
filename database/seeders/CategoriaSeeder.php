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
            "name"=>"Other",
            "created_at"=>now(),
            ]);
        DB::table('categorias')->insert([
            "name"=>"adminitracion",
            "created_at"=>now(),
            ]);
        DB::table('categorias')->insert([
            "name"=>"Security",
            "created_at"=>now(),
            ]);
    }
}
