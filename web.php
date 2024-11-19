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

Route::get('/', function () {
    return view('welcome');
});


/*Hello World*/
/*
use App\Http\Controllers\PlayersController;
Route::get('/', [PlayersController::class, 'index']);
*/


/*これはテストです。
　これはサンプルです　playersファイル内にblade.phpを作成*/

use App\Http\Controllers\PlayersController;

Route::get('/', [PlayersController::class, 'index']);
Route::get('/', [PlayersController::class, 'index'])->name('players.index');
Route::get('/players/{id}', [PlayersController::class, 'show'])->name('players.show');
