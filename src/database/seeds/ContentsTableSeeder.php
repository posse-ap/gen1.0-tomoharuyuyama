<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([
            [
                'name' => 'ドットインストール',
                'color' => '#1754EF',
                'is_lang' => '0',
                'is_show' => '1',
            ],
            [
                'name' => 'N予備校',
                'color' => '#0F71BD',
                'is_lang' => '0',
                'is_show' => '1',
            ],
            [
                'name' => 'POSSE課題',
                'color' => '#20BDDE',
                'is_lang' => '0',
                'is_show' => '1',
            ],
            [
                'name' => 'JavaScript',
                'color' => '#1754EF',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => 'CSS',
                'color' => '#0F71BD',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => 'PHP',
                'color' => '#20BDDE',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => 'HTML',
                'color' => '#3CCEFE',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => 'Laravel',
                'color' => '#B29EF3',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => 'SQL',
                'color' => '#6D46EC',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => 'SHELL',
                'color' => '#4A17EF',
                'is_lang' => '1',
                'is_show' => '1',
            ],
            [
                'name' => '情報システム基礎知識(その他)',
                'color' => '#3105C0',
                'is_lang' => '1',
                'is_show' => '1',
            ],
        ]);
    }
}
