<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizyQuaestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'prefecture_id' => 2,
            'question_id' => 0,
            'question_title' => '馬洩朱些斯',
        ];
        DB::table('QuizyQuaestionTable')->insert($param);
        $param = [
            'prefecture_id' => 2,
            'question_id' => 1,
            'question_title' => '羅府',
        ];
        DB::table('QuizyQuaestionTable')->insert($param);
        $param = [
            'prefecture_id' => 2,
            'question_id' => 2,
            'question_title' => '辺西威業',
        ];
        DB::table('QuizyQuaestionTable')->insert($param);
    }
}
