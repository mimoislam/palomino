<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\TypeController;

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
})->name('home');

Route::get('/menu/trash',[MenuController::class,'trash'])->name('menu.trash');
Route::delete('/menu/trash/{id}',[MenuController::class,'forcedelete'])->name('menu.trash.delete');
Route::get('/menu/trash/{id}',[MenuController::class,'restore'])->name('menu.trash.restore');

Route::get('/plat/trash',[PlatController::class,'trash'])->name('plat.trash');
Route::delete('/plat/trash/{id}',[PlatController::class,'forcedelete'])->name('plat.trash.delete');
Route::get('/plat/trash/{id}',[PlatController::class,'restore'])->name('plat.trash.restore');


Route::get('/type/trash',[TypeController::class,'trash'])->name('type.trash');
Route::delete('/type/trash/{id}',[TypeController::class,'forcedelete'])->name('type.trash.delete');
Route::get('/type/trash/{id}',[TypeController::class,'restore'])->name('type.trash.restore');

Route::resource('/menu', MenuController::class);
Route::resource('/plat', PlatController::class);
Route::resource('/type',TypeController::class);
