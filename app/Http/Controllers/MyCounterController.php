<?php
// テスト用のコントローラ

namespace App\Http\Controllers;

use App\Services\srvMyCounter;

class MyCounterController extends Controller
{
    public function increment()
    {
        $count = srvMyCounter::increment();
        // ビューFile:viewmycounter
        // ビューに値を渡す引数名：countValue
        return view('viewmycounter', ['countValue' => $count]);
    }
}
