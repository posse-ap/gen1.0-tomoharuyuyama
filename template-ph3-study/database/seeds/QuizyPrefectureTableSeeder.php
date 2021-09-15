<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizyPrefectureTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '東京',
        ];
        DB::table('QuizyPrefectures')->insert($param);

        $param = [
            'name' => '広島',
        ];
        DB::table('QuizyPrefectures')->insert($param);

        $param = [
            'name' => 'アメリカ合衆国',
        ];
        DB::table('QuizyPrefectures')->insert($param);
    }
}