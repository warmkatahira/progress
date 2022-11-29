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
            $post->info_2_label = $request->info_2_label;
            $post->info_2_text = $request->info_2_text;
            $post->info_3_label = $request->info_3_label;
            $post->info_3_text = $request->info_3_text;
            $post->save();
        }
        if($post_count != 0){
            Post::where('customer_code', $request->customer_code)->update([
                'info_1_label' => $request->info_1_label,
                'info_1_text' => $request->info_1_text,
                'info_2_label' => $request->info_2_label,
                'info_2_text' => $request->info_2_text,
                'info_3_label' => $request->info_3_label,
                'info_3_text' => $request->info_3_text,
            ]);
        }
        return response()->json([
            "message" => "post record created"
        ], 201);
    }
}
