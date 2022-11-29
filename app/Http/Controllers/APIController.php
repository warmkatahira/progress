<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class APIController extends Controller
{
    public function getAll()
    {
        $posts = Post::get()->toJson(JSON_PRETTY_PRINT);
        return response($posts, 200);
    }

    public function create(Request $request)
    {
        // postsテーブルにcustomer_codeがなければ追加、あれば更新
        $post_count = Post::where('customer_code', $request->customer_code)->count();
        if($post_count == 0){
            $post = new Post;
            $post->customer_code = $request->customer_code;
            $post->info_1_label = $request->info_1_label;
            $post->info_1_text = $request->info_1_text;
            $post->save();
        }
        if($post_count != 0){
            Post::where('customer_code', $request->customer_code)->update([
                $post->info_1_label = $request->info_1_label;
                $post->info_1_text = $request->info_1_text;
            ]);
        }
        return response()->json([
            "message" => "post record created"
        ], 201);
    }
}
