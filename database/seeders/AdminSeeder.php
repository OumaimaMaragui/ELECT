<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        DB::table('admins')->insert([
            'email' => 'admin@gmail.com',
            'password' => '$2y$10$luQKq0UMlTr6.v0WiRfsIO.u5PSDwT0uLmGfprX1cutH8Hj5f/YvS',
    
        ]);
    }
}
