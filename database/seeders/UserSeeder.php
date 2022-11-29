<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'システム管理者',
            'user_name' => 'admin',
            'email' => 't.katahira@warm.co.jp',
            'password' => bcrypt('katahira134'),
            'role_id' => 1,
            'status' => 1,
        ]);
        User::create([
            'name' => '共通ユーザー',
            'user_name' => 'user',
            'email' => 'warm@warm.co.jp',
            'password' => bcrypt('user12345'),
            'role_id' => 100,
            'status' => 1,
        ]);
    }
}
