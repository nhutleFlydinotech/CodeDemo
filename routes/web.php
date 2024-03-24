<?php

use App\Http\Controllers\demoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('test-queue', [demoController::class, 'testQueue']);
Route::get('get-cache', function () {
    return Cache::get('test_2');
});
