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
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '1',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '2',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '2',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '3',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '3',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '4',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '4',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '5',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '5',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '6',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '6',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '7',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '7',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '8',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '8',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '9',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '9',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '10',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '10',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '11',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '11',
                'learning_hour' => '0',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '12',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '1',
                'learning_hour' => '1.5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '13',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '3',
                'learning_hour' => '1.5',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '14',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '2',
                'learning_hour' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '15',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '4',
                'learning_hour' => '3',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '16',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '6',
                'learning_hour' => '13',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '17',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '9',
                'learning_hour' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => '18',
                'learned_date' => date('Y-m-d'),
                'learning_content_id' => '11',
                'learning_hour' => '8',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}