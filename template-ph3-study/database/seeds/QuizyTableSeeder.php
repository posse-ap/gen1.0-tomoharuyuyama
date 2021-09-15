<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuizyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'prefecture' => 0,
            'question_id' => 0,
            'name' => 'たかなわ',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 0,
            'name' => 'こうわ',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 0,
            'name' => 'たかわ',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 1,
            'name' => 'かめいど',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 1,
            'name' => 'かめと',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 1,
            'name' => 'かめど',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 2,
            'name' => 'こうじまち',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 2,
            'name' => 'おかとまち',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 0,
            'question_id' => 2,
            'name' => 'かゆまち',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);
        
        $param = [
            'prefecture' => 1,
            'question_id' => 0,
            'name' => 'むかいなだ',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 0,
            'name' => 'むこうひら',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 0,
            'name' => 'むきひら',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 1,
            'name' => 'みつぎ',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 1,
            'name' => 'みよし',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 1,
            'name' => 'おしらべ',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 2,
            'name' => 'なかやま',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 2,
            'name' => 'きやま',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 1,
            'question_id' => 2,
            'name' => 'ぎんぜん',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);
        
        $param = [
            'prefecture' => 2,
            'question_id' => 0,
            'name' => 'マサチューセッツ州（答え）',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);
        
        $param = [
            'prefecture' => 2,
            'question_id' => 0,
            'name' => 'コロラド州',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 2,
            'question_id' => 0,
            'name' => 'ニュージャージー州',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);
        $param = [
            'prefecture' => 2,
            'question_id' => 1,
            'name' => 'ロサンゼルス（答え）',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 2,
            'question_id' => 1,
            'name' => 'レキシントン',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 2,
            'question_id' => 1,
            'name' => 'ボストン',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);
        $param = [
            'prefecture' => 2,
            'question_id' => 2,
            'name' => 'ペンシルベニア州（答え）',
            'valid' => 1,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 2,
            'question_id' => 2,
            'name' => 'ミネソタ州',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);

        $param = [
            'prefecture' => 2,
            'question_id' => 2,
            'name' => 'ミズーリ州',
            'valid' => 0,
        ];
        DB::table('quizy')->insert($param);
        
    }
}
