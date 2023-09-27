<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// routes/web.php

Route::get('/vending','App\Http\Controllers\VendingController@index')->name('vending.index');
Route::get('/vending/create','App\Http\Controllers\VendingController@create')->name('vending.create')->middleware('auth');
Route::post('/vending/store/','App\Http\Controllers\VendingController@store')->name('vending.store')->middleware('auth');
Route::get('/vending/edit/{vending}','App\Http\Controllers\VendingController@edit')->name('vending.edit')->middleware('auth');
Route::put('/vending/edit/{vending}','App\Http\Controllers\VendingController@update')->name('vending.update')->middleware('auth');
Route::get('/vending/show/{vending}', 'App\Http\Controllers\VendingController@show')->name('vending.show');
Route::delete('/vending/{vending}','App\Http\Controllers\VendingController@destroy')->name('vending.destroy')->middleware('auth');
Route::post('/products', 'ProductController@store')->name('products.store');


