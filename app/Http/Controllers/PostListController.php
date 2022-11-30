<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostListService;
use App\Services\CommonService;

class PostListController extends Controller
{
    public function index()
    {
        // サービスクラスを定義
        $PostListService = new PostListService;
        $CommonService = new CommonService;
        // 拠点情報を取得
        $base_info = $CommonService->getBases(true);
        // 初期条件をセット
        $PostListService->setDefaultParameter();
        // 検索処理
        $posts = $PostListService->searchPosts();
        return view('post_list.index')->with([
            'posts' => $posts,
            'base_info' => $base_info,
        ]);
    }

    public function search(Request $request)
    {
        // サービスクラスを定義
        $PostListService = new PostListService;
        $CommonService = new CommonService;
        // 拠点情報を取得
        $base_info = $CommonService->getBases(true);
        // 抽出条件をセット
        $PostListService->setSearchParameter($request);
        // 検索処理
        $posts = $PostListService->searchPosts();
        return view('post_list.index')->with([
            'posts' => $posts,
            'base_info' => $base_info,
        ]);
    }
}
