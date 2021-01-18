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
Route::post('/crude_rates/import',[App\Http\Controllers\CrudeSuicideRateController::class,'import'])->name('crude_import');
Route::post('/crude_rates',[App\Http\Controllers\CrudeSuicideRateController::class,'get']);

Route::post('/expect_births/import',[App\Http\Controllers\ExpectBirthController::class,'import'])->name('expect_import');
Route::post('/expect_births',[App\Http\Controllers\ExpectBirthController::class,'get']);

Route::post('/doctors/import',[App\Http\Controllers\DoctorController::class,'import'])->name('doctor_import');
Route::post('/doctors',[App\Http\Controllers\DoctorController::class,'get']);

Route::post('/pharmacists/import',[App\Http\Controllers\PharmacistController::class,'import'])->name('pharmacist_import');
Route::post('/pharmacists',[App\Http\Controllers\PharmacistController::class,'get']);

Route::post('/nurses/import',[App\Http\Controllers\NurseController::class,'import'])->name('nurse_import');
Route::post('/nurses',[App\Http\Controllers\NurseController::class,'get']);

Route::post('/asia',function(){
   $asia=cache()->remember('asia',200,function(){
       return file_get_contents(public_path().'/assets/asia.geojson');
   });
   return $asia;
});
Route::view('/import','import');
