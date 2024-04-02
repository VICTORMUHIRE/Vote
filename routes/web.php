<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboadController;
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


Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'doLogin']);
Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');

Route::prefix('admin')-> name('admin.')->middleware('auth')->group(function(){
    Route::get('/dashboad',[DashboadController::class,'index'])->name('dashboad');
    Route::resource('faculte', \App\Http\Controllers\Admin\FacultyController::class)->except(['show']);
    Route::resource('promotion', \App\Http\Controllers\Admin\PromotionController::class)->except(['show']);
});
