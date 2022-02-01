<?php

use App\Http\Controllers\LoginController;
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

/*
|
|--------------------------------------------------------------------------
| React scaffolded
|--------------------------------------------------------------------------
|
 */

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// New added Routes

Route::get('/principal', [\App\Http\Controllers\Users\RoutingController::class, 'principal'])->name('principal');
Route::get('/category', [\App\Http\Controllers\Users\RoutingController::class, 'category'])->name('category');

// Individual Categories

Route::prefix('category')->group(function () {
    Route::get('cat1', [\App\Http\Controllers\Users\RoutingController::class, 'category'])->name('category.cat1');
});
