<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Customer;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'customer_code' => 'intervia',
            'customer_name' => 'intervia',
            'base_name' => '第1営業所',
        ]);
        Customer::create([
            'customer_code' => 'ueni',
            'customer_name' => 'ウエニ貿易',
            'base_name' => 'ロジコンタクト',
        ]);
        Customer::create([
            'customer_code' => '2flag',
            'customer_name' => '2FLAG',
            'base_name' => 'ロジステーションプラス',
        ]);
    }
}
