<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::middleware(['auth'])->group(function () {
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Produkti',[App\Http\Controllers\ProductsController::class, 'products'])->name('productsinfo');
Route::get('/Pirkumi', [App\Http\Controllers\HomeController::class, 'pirkumi'])->name('pirkumi');
Route::post('/Pirkumi', [App\Http\Controllers\PirkumiController::class, 'pirkums'])->name('pirkums');
Route::get('/Kopsavilkums', [App\Http\Controllers\TotalController::class, 'totalcount'])->name('totalcount');
});
