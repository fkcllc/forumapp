<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\MyCounterController;
// テスト用のルート
Route::get('/mycounter', [MyCounterController::class, 'increment']);
// *PHP хэлэнд классын статик функц эсвэл гишүүнд хандахдаа ::(scope resolution operator) ашигладаг.

// Authorization =>「認可」や「権限付与」=> эрхийн шалгалт
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
