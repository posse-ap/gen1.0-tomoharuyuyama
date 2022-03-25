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
                'is_lang' => '0',
            ],
            [
                'name' => 'N予備校',
                'is_lang' => '0',
            ],
            [
                'name' => 'POSSE課題',
                'is_lang' => '0',
            ],
            [
                'name' => 'JavaScript',
                'is_lang' => '1',
            ],
            [
                'name' => 'CSS',
                'is_lang' => '1',
            ],
            [
                'name' => 'PHP',
                'is_lang' => '1',
            ],
            [
                'name' => 'HTML',
                'is_lang' => '1',
            ],
            [
                'name' => 'Laravel',
                'is_lang' => '1',
            ],
            [
                'name' => 'SQL',
                'is_lang' => '1',
            ],
            [
                'name' => 'SHELL',
                'is_lang' => '1',
            ],
            [
                'name' => '情報システム基礎知識(その他)',
                'is_lang' => '1',
            ],
        ]);
    }
}
