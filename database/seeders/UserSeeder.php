<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
    for($i=1;$i<10;$i++){
        DB::table('users')->insert([
            'nom' => STR::random(8),
            'email' => STR::random(6).'gmail.com',
            'prenom' => STR::random(8),
            'type'=> STR::random(8),
            'cin' => STR::random(8),
            'telephone' => STR::random(8),
            'ville' => STR::random(8),
            'rue' => STR::random(8),
            'password' => Hash::make('password'),
    
        ]);}
    }
}
