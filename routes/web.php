<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\DataSekolahController;

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

// Route::get('/', function () {
//     return view('home');
// });

Route::get('/', [SekolahController::class, 'index']);
Route::get('/sekolah', [SekolahController::class, 'sekolah']);
Route::get('/detail/{id}', [SekolahController::class, 'detail']);
Route::get('/auth', [AuthController::class, 'index'])->middleware('guest');
Route::post('/auth', [AuthController::class, 'authenticate']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::get('/beranda', [BerandaController::class, 'index'])->middleware('auth');
Route::resource('/dataSekolah', DataSekolahController::class);
