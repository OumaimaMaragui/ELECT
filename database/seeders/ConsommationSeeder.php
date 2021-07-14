<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
        $year = 2021;
        for($i=1;$i<5;$i++){
            DB::table('consommations')->insert([
                'user_id' => 1,
                'consommation' => mt_rand(1, 1000),
                'date' => ($year-$i).'-'.$i.'-15',
            ]);}

            $now = Carbon::now();
            for($i=0;$i<5;$i++){
        DB::table('consommations')->insert([
            'user_id' => 1,
            'consommation' => mt_rand(1, 1000),
            'date' => $now,
        ]);
        $now = $now->addMonths(-1);

    }
    $now = Carbon::now();

    for($i=0;$i<5;$i++){
        DB::table('consommations')->insert([
            'user_id' => 1,
            'consommation' => mt_rand(1, 1000),
            'date' => $now,
        ]);
        $now = $now->addDays(-1);

    }

}}

