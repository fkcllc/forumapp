<?php
// テスト用のサービス

namespace App\Services;

class srvMyCounter {
    public static $count = 0;

    public static function increment() {
        self::$count++;
        return self::$count;
    }
}
