<?php

// namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            [
                'id' => '1',
                'learned_date' => '2020-10-01',
                'learning_content_id' => '1',
                'learning_hour' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'learned_date' => '2020-10-01',
                'learning_content_id' => '2',
                'learning_hour' => '1.6',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'learned_date' => '2020-10-11',
                'learning_content_id' => '4',
                'learning_hour' => '2.4',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'learned_date' => '2020-10-21',
                'learning_content_id' => '5',
                'learning_hour' => '2',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'learned_date' => '2020-10-18',
                'learning_content_id' => '2',
                'learning_hour' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'learned_date' => '2020-10-21',
                'learning_content_id' => '1',
                'learning_hour' => '2.5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'learned_date' => '2020-10-01',
                'learning_content_id' => '3',
                'learning_hour' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'learned_date' => '2020-10-01',
                'learning_content_id' => '5',
                'learning_hour' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'learned_date' => '2020-11-01',
                'learning_content_id' => '4',
                'learning_hour' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'learned_date' => '2020-11-01',
                'learning_content_id' => '2',
                'learning_hour' => '3.5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}