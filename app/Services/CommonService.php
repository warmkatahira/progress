<?php

namespace App\Services;

use Carbon\Carbon;
use App\Models\Base;

class CommonService
{
    // basesテーブルの情報+パラメータによって「全社」も取得する
    public function getBases($zensha_enabled)
    {
        // 拠点情報を取得
        $bases = Base::all();
        // 配列をセット
        $base_info = [];
        // 全社を格納するか変数によって可変
        if($zensha_enabled == true){
            // 全社を格納
            $base_info[0] = '全社';
        }
        // 拠点テーブルの内容を格納
        foreach($bases as $base){
            $base_info[$base->base_id] = $base->base_name;
        }
        return $base_info;
    }
}