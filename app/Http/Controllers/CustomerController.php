<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerService;
use App\Services\CommonService;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    public function register_index()
    {
        // サービスクラスを定義
        $CommonService = new CommonService;
        // 拠点情報を取得
        $base_info = $CommonService->getBases(false);
        return view('customer.register')->with([
            'base_info' => $base_info,
        ]);
    }

    public function register(CustomerRequest $request)
    {
        // サービスクラスを定義
        $CustomerService = new CustomerService;
        // 荷主を追加
        $CustomerService->registerCustomer($request);
        return redirect()->route('customer_list.index');
    }

    public function modify_index(Request $request)
    {
        // サービスクラスを定義
        $CommonService = new CommonService;
        $CustomerService = new CustomerService;
        // 拠点情報を取得
        $base_info = $CommonService->getBases(false);
        // 変更対象の荷主情報を取得
        $customer = $CustomerService->getcustomer($request->customer_code);
        return view('customer.modify')->with([
            'base_info' => $base_info,
            'customer' => $customer,
        ]);
    }

    public function modify(Request $request)
    {
        // サービスクラスを定義
        $CustomerService = new CustomerService;
        // 荷主情報を変更
        $CustomerService->modifyCustomer($request);
        return redirect()->route('customer_list.index');
    }
}
