<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Base;
use App\Models\Customer;

class CustomerService
{
    public function registerCustomer($request)
    {
        // 荷主を追加
        Customer::create([
            'customer_code' => $request->customer_code,
            'customer_name' => $request->customer_name,
            'base_id' => $request->base,
        ]);
        return;
    }

    public function getCustomer($customer_code)
    {
        // 荷主コードから荷主情報を取得
        $customer = Customer::where('customer_code', $customer_code)->first();
        return $customer;
    }

    public function modifyCustomer($request)
    {
        // 荷主情報を更新
        Customer::where('customer_code', $request->customer_code)->update([
            'base_id' => $request->base,
            'customer_name' => $request->customer_name,
        ]);
        return;
    }

    public function deleteCustomer($customer_code)
    {
        // 荷主を削除
        Customer::where('customer_code', $customer_code)->delete();
        return;
    }
}