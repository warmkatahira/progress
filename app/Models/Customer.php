<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    // 主キーカラムを変更
    protected $primaryKey = 'customer_code';
    // オートインクリメント無効化
    public $incrementing = false;
    // 操作するカラムを許可
    protected $fillable = [
        'customer_code',
        'customer_name',
        'base_id',
        'is_detail_available',
    ];

    public function base()
    {
        return $this->belongsTo('App\Models\Base', 'base_id', 'base_id');
    }
}
