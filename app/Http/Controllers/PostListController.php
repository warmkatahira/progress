<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PostListService;
use App\Services\CommonService;
use App\Models\Post;

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

    public function view_change(Request $request){
        // サービスクラスを定義
        $PostListService = new PostListService;
        $CommonService = new CommonService;
        // 拠点情報を取得
        $base_info = $CommonService->getBases(true);
        // ビュー情報をセット
        $PostListService->setViewType($request);
        // 検索処理
        $posts = $PostListService->searchPosts();
        return view('post_list.index')->with([
            'posts' => $posts,
            'base_info' => $base_info,
        ]);
    }

    public function detail(Request $request)
    {
        // 詳細を表示するpostを取得
        $post = Post::getSpecify($request->customer_code)->first();
        return view('post_list.detail')->with([
            'post' => $post,
        ]);
    }

    public function progress_chart_ajax(Request $request)
    {
        // 詳細を表示するpostを取得
        $post = Post::getSpecify($request->customer_code)->first();
        // 進捗率を計算
        $complete = $post->info_1_text - $post->info_2_text;
        $progress_1 = floor(($complete / $post->info_1_text) * 1000) / 10;
        $progress_2 = 100 - $progress_1;
        // 結果を返す
        return response()->json([
            'progress_1' => $progress_1,
            'progress_2' => $progress_2,
        ]);
    }

}
