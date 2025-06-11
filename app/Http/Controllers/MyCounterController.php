<?php
// テスト用のコントローラ

namespace App\Http\Controllers;

use App\Services\srvMyCounter;
use App\Models\User; // ユーザーモデルをインポート

class MyCounterController extends Controller
{
    public function increment()
    {
        $count = srvMyCounter::increment();
        // ビューFile:viewmycounter
        // ビューに値を渡す引数名：countValue
        return view('viewmycounter', ['countValue' => $count]);
    }

    public function modelbind(User $usrBind)
    {
        // ユーザーモデルのインスタンスを取得
        // ルートモデルバインディングを使用して、引数に渡された$usrBindはUserモデルのインスタンス
        // $user = User::findOrFail(1); // ユーザーモデルのインスタンスを取得
        // dd($user);

        dd('Model Binding: User ID = ' . $usrBind->id . ', Name = ' . $usrBind->name);

    }
}
