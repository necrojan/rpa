<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('hello', function () {
    return 'hello';
});
Route::get('/cashier', [\App\Http\Controllers\CashierController::class, 'index']);
Route::post('/cashier', [\App\Http\Controllers\CashierController::class, 'store']);
Route::get('/cashier-list', [\App\Http\Controllers\CashierController::class, 'list']);
Route::get('/fullfiller', [\App\Http\Controllers\FullFillerController::class, 'index']);
Route::put('/fullfiller/{id}', [\App\Http\Controllers\FullFillerController::class, 'update']);
