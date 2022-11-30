<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CustomerListService;

class CustomerListController extends Controller
{
    public function index()
    {
        // サービスクラスを定義
        $CustomerListService = new CustomerListService;
        // 拠点情報を取得
        $base_info = $CustomerListService->getBases();
        // 初期条件をセット
        $CustomerListService->setDefaultParameter();
        // 検索処理
        $customers = $CustomerListService->searchCustomers();
        return view('customer_list.index')->with([
            'customers' => $customers,
            'base_info' => $base_info,
        ]);
    }

    public function search(Request $request)
    {
        // サービスクラスを定義
        $CustomerListService = new CustomerListService;
        // 拠点情報を取得
        $base_info = $CustomerListService->getBases();
        // 抽出条件をセット
        $CustomerListService->setSearchParameter($request);
        // 検索処理
        $customers = $CustomerListService->searchCustomers();
        return view('customer_list.index')->with([
            'customers' => $customers,
            'base_info' => $base_info,
        ]);
    }
}
