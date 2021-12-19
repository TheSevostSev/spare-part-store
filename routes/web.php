<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'App\Http\Controllers\StoreController@show');
Route::get('/reservepart/{reservepart}', 'App\Http\Controllers\ReservePartController@show');
Route::get('/reservepart/{reservepart}/{receipt}', 'App\Http\Controllers\ReceiptController@show');
Route::get('/contacts', 'App\Http\Controllers\ContactController@index');
Route::post('/contacts', 'App\Http\Controllers\ContactController@revocation')->middleware('auth');
Route::get('/search', 'App\Http\Controllers\SearchPartController@show');
Route::get('/createpart', 'App\Http\Controllers\ReservePartController@create')->middleware('isAdmin');
Route::post('/createpart', 'App\Http\Controllers\ReservePartController@store')->middleware('isAdmin');
Route::post('/search/part', 'App\Http\Controllers\SearchPartController@index');
Route::post('/search/order', 'App\Http\Controllers\ReceiptController@index');
Route::get('/delete', 'App\Http\Controllers\StoreController@delete')->middleware('isAdmin');
Route::get('/createcar', 'App\Http\Controllers\AutoController@create')->middleware('isAdmin');
Route::post('/createcar', 'App\Http\Controllers\AutoController@store')->middleware('isAdmin');
Route::get('/createmodel', 'App\Http\Controllers\AutoModelController@create')->middleware('isAdmin');
Route::post('/createmodel', 'App\Http\Controllers\AutoModelController@store')->middleware('isAdmin');
Route::put('/edit/{reservepart}', 'App\Http\Controllers\ReservePartController@update');
Route::post('/edit/{reservepart}', 'App\Http\Controllers\ReservePartController@edit')->middleware('isAdmin');
Route::get('/edit/{reservepart}', 'App\Http\Controllers\ReservePartController@edit')->middleware('isAdmin');
Route::post('/search/number', 'App\Http\Controllers\ReservePartController@index');
Route::post('/search/name', 'App\Http\Controllers\StoreController@index');
Route::post('/delete/{reservepart}', 'App\Http\Controllers\ReservePartController@delete')->middleware('isAdmin');
Route::post('/cancel/{receipt}', 'App\Http\Controllers\ReceiptController@cancel');
Route::post('/give/{receipt}', 'App\Http\Controllers\ReceiptController@give');
Route::post('/pay/{id}', 'App\Http\Controllers\PaymentController@create')->middleware('auth');
Route::get('/add/{reservepart}', 'App\Http\Controllers\ReservePartController@show_amount')->middleware('isAdmin');
Route::put('/add/{reservepart}', 'App\Http\Controllers\ReservePartController@add_amount')->middleware('isAdmin');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
