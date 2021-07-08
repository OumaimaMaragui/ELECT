<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NotifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($j=2;$j<5;$j++){
        for($i=1;$i<12;$i++){
            if(($i+$j) % 3 == 0 ){
            DB::table('notifications')->insert([
                'user_id' => $i ,
                'type' => 'notification',
                'texte' => Str::random(10),
                'date' => Date::createFromDate(),
            ]);}
            elseif(($i+$j) % 2 == 0){
                DB::table('notifications')->insert([
                    'user_id' => $i ,
                    'type' => 'alerte',
                    'texte' => Str::random(10),
                    'date' => Date::createFromDate(),
                ]);
            }else{
                DB::table('notifications')->insert([
                    'user_id' => $i ,
                    'type' => 'annonce',
                    'texte' => Str::random(10),
                    'date' => Date::createFromDate(),
                ]);
            }
        }
    }
    }
}
