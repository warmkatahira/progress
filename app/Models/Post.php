<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    // 主キーカラムを変更
    protected $primaryKey = 'customer_code';
    // オートインクリメント無効化
    public $incrementing = false;
    // 操作するカラムを許可
    protected $fillable = [
        'customer_code',
        'info_1_label',
        'info_1_text',
        'info_2_label',
        'info_2_text',
        'info_3_label',
        'info_3_text',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Models\Customer', 'customer_code', 'customer_code');
    }
}
