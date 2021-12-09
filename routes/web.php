<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuadraController;
use App\Http\Controllers\UsuarioController;

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
    return view('inicial');
});

Route::get('/', 'App\Http\Controllers\Initial\InicioController@index');
// Route::get('/', [InicioController::class, "index"]);
Route::get('/usuario', [InicioController::class, "user"]);

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
      return view('dashboard');
    })->name('dashboard');
    Route::resource("quadra", QuadraController::class);
  });

