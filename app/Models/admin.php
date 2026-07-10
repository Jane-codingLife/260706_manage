<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    // 欄位
    protected $fillable = [
        'aid', 'aname', 'passwd'
    ];
    // 欄位屬性
    protected $casts = [
        'aid' => 'string',
    ];
    // 抓取的資料表，預設抓取同名稱+s，若設定不相同的話需要特別指定
    protected $table = 'admin';
    // 主鍵 => 預設抓取自動編號的那個欄位，所以沒有自動編號需要特別指定
    protected $primaryKey = 'aid';
    // 時間戳記，如果沒有日期時間欄位需設定 false
    public $timestamps = false;
}
