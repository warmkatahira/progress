<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Base;
use App\Models\Post;

class PostListService
{
    // basesテーブルの情報+パラメータによって「全社」も取得する
    public function getBases()
    {
        // 拠点情報を取得
        $bases = Base::all();
        // 配列をセット
        $base_info = [];
        // 全社を格納
        $base_info[0] = '全社';
        // 拠点テーブルの内容を格納
        foreach($bases as $base){
            $base_info[$base->base_id] = $base->base_name;
        }
        return $base_info;
    }

    public function setDefaultParameter()
    {
        // 初期条件をセット(全社をセット)
        session(['search_base' => 0]);
        return;
    }

    public function setSearchParameter($request)
    {
        // 抽出条件をセット
        session(['search_base' => $request->search_base]);
        return;
    }

    public function searchPosts()
    {
        // 使用するテーブルを結合
        $posts = Post::join('customers', 'customers.customer_code', 'posts.customer_code');
        // 全社（=0）以外であれば条件を適用
        if(session('search_base') != 0){
            $posts = $posts->where('base_id', session('search_base'));
        }
        $posts = $posts->orderBy('posts.updated_at', 'desc')->get();
        return $posts;
    }
}