<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});
*/

/*Hello World*/
/*
use App\Http\Controllers\PlayersController;
Route::get('/', [PlayersController::class, 'index']);
*/


use App\Http\Controllers\PlayersController;

/*これはテストです。
　これはサンプルです　playersファイル内にblade.phpを作成
Route::get('/', [PlayersController::class, 'index']);
*/

/*7-1*/
/*選手リスト*/
Route::get('/', [PlayersController::class, 'index'])->name('players.index');
/*選手データ*/
Route::get('/players/{id}', [PlayersController::class, 'show'])->name('players.show');


/*7-2*/
/*ログイン*/
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
    ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store']);

/*編集*/
Route::get('/players/{id}/edit', [PlayersController::class, 'edit'])->name('players.edit');
Route::put('/players/{id}', [PlayersController::class, 'update'])->name('players.update');


/*削除*/
Route::delete('/players/{id}', [PlayersController::class, 'destroy'])->name('players.destroy');

//登録ページ
use App\Http\Controllers\Auth\RegisterController;
//Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

//一般ユーザー
use App\Http\Controllers\GeneralController;
Route::get('/general', [GeneralController::class, 'index'])->name('general.index');

