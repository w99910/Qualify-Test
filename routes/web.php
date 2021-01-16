<?php

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
Route::get('/crude_rates/import',[App\Http\Controllers\CrudeSuicideRateController::class,'import']);
Route::post('/crude_rates',[App\Http\Controllers\CrudeSuicideRateController::class,'get']);

Route::get('/expect_births/import',[App\Http\Controllers\ExpectBirthController::class,'import']);
Route::post('/expect_births',[App\Http\Controllers\ExpectBirthController::class,'get']);
