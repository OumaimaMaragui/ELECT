<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;


class ConsommationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<13;$i++){
            DB::table('consommations')->insert([
                'user_id' => $i,
                'consommation' => mt_rand(1, 1000),
                'date' => '2019-'.$i.'-15',
            ]);}
        }
}

