<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrioridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('prioridads')->insert([
            "name"=>"Alta",
            "created_at"=>now(),
            ]);
        DB::table('prioridads')->insert([
            "name"=>"Media",
            "created_at"=>now(),
            ]);
        DB::table('prioridads')->insert([
            "name"=>"Baja",
            "created_at"=>now(),
            ]);

    }
}
