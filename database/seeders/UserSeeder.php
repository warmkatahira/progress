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
            'email' => 't.katahira@warm.co.jp',
            'password' => bcrypt('katahira134'),
            'role_id' => 1,
            'status' => 1,
        ]);
    }
}
