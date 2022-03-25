<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id' => '1',
                'name' => 'ゆやま',
                'email' => 'test@com',
                'is_admin' => 1,
                'password' => '$2y$10$HCa1w90KdCKb7inbIIXZBeOaDn8/8i1Z0SC1D6eIZHAuGe9rXtRLC',
            ],
        ]);

        DB::table('users')->insert([
            [
                'id' => '2',
                'name' => 'ゆやま2',
                'email' => 'test2@com',
                'is_admin' => 0,
                'password' => '$2y$10$HCa1w90KdCKb7inbIIXZBeOaDn8/8i1Z0SC1D6eIZHAuGe9rXtRLC',
            ],
        ]);
    }
}
