<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('users')->insert([
            "name"=>"Aimar",
            "email"=>"aimar.peleaar@elorrieta-errekamari.com",
            "password"=>bcrypt("12345678"),
            "department_id"=>1,
            "created_at"=>now(),
            ]);
        DB::table('users')->insert([
            "name"=>"Milena",
            "email"=>"milena@elorrieta-errekamari.com",
            "password"=>bcrypt("12345678"),
            "department_id"=>2,
            "created_at"=>now(),
            ]);
        DB::table('users')->insert([
            "name"=>"Juan",
            "email"=>"juan@elorrieta-errekamari.com",
            "password"=>bcrypt("12345678"),
            "department_id"=>2,
            "created_at"=>now(),
            ]);


    }
}
