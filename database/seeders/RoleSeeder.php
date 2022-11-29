<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'role_id' => 1,
            'role_name' => 'システム管理者',
        ]);
        Role::create([
            'role_id' => 100,
            'role_name' => '一般',
        ]);
    }
}
