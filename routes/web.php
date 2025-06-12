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

// Жишээнд param1,param2 гэсэн хоёр параметрийг хүлээн авах ParameterpassingController controller-ийн,
// passparams методыг тодорхойлж байна.,
use App\Http\Controllers\ParameterpassingController;
Route::get('/parameterpassing/{param1}/{param2}', [ParameterpassingController::class, 'passparams']);


// Authorization =>「認可」や「権限付与」=> эрхийн шалгалт
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// テスト用のルート
Route::get('/greeting', function () {
    return 'Hello World';
});

// Ижил үүрэгтэй маршрутуудыг prefix тодорхойлж групплэх
use App\Http\Controllers\PrefController;
Route::prefix('/prefixes')->group(function () {

    // プレフィックスを指定してルートをグループ化
    // グループ内のルートは、プレフィックスを持つ

    // Unamed routes
    Route::get('/test', [PrefController::class ,'pref1method']);
    // named routes
    Route::post('/test', [PrefController::class, 'pref2method'])->name('pref2named');
    Route::put('/test', [PrefController::class, 'pref3method'])->name('pref3named');

});

// Route model binding sample
Route::get('/binding/{usrBind}', [MyCounterController::class, 'modelbind']);

use App\Http\Controllers\ProfileController;
Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');

// JapanWork --------------------------------------------------- Start

use App\Http\Controllers\JobController;

// Route::get('/jobs', [JobController::class, 'index'])->name('jobs.index');
Route::resource('jobs', App\Http\Controllers\JobController::class);
// Ингэснээр дараах бүх маршрут автоматаар үүснэ:
// GET /jobs → index
// GET /jobs/create → create
// POST /jobs → store
// GET /jobs/{job} → show
// GET /jobs/{job}/edit→ edit
// PUT /jobs/{job} → update
// DELETE /jobs/{job} → destroy

// JapanWork --------------------------------------------------- End
