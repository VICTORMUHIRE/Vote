<?php

use App\Http\Controllers\Admin\ElectionController;
use App\Http\Controllers\Admin\SuperviseurController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboadController;
use App\Http\Controllers\Etudiant\PostullerController;
use App\Http\Controllers\superviseur\SuperviseurActionsController;
use Illuminate\Support\Facades\Route;

Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::post('/login',[AuthController::class, 'doLogin']);
Route::delete('/logout',[AuthController::class, 'logout'])->name('logout');
Route::get('/password',[AuthController::class,'create'])->name('create.password');
Route::post('/password',[AuthController::class,'store'])->name('store.password');


Route::prefix('admin')-> name('admin.')->middleware('auth')->middleware('admin')->group(function(){
    Route::get('/dashboad',[DashboadController::class,'index'])->name('dashboad');
    Route::resource('faculte', \App\Http\Controllers\Admin\FacultyController::class)->except(['show']);
    Route::resource('promotion', \App\Http\Controllers\Admin\PromotionController::class)->except(['show']);
    Route::resource('superviseur', \App\Http\Controllers\Admin\SuperviseurController::class)->except(['show']);

    route::get('/election/generate',[ElectionController::class,'index'])->name('election');
    Route::post('/election/generate', [ElectionController::class, 'generate'])->name('election.generate');
    Route::delete('/election/delete', [ElectionController::class, 'delete'])->name('election.delete');
    Route::get('/election/annoncer', [ElectionController::class, 'annoncerScrutin'])->name('election.annoncer');
});

Route::prefix('etudiant')->name('etudiant.')->middleware('auth')->middleware('etudiant')->group(function(){
    route::get('election/postuler',[PostullerController::class, 'postuler'])->name('postuler');
    Route::get('/elections/{type}/{userId}', [PostullerController::class, 'getElectionByUser']);
    Route::get('/etudiant/infos', [PostullerController::class, 'infos'])->name('infos');
    Route::post('/postuler',[PostullerController::class,'storeInfos'])->name('storeInfos');

});

Route::prefix('candidat')->name('candidat.')->middleware('auth')->middleware('candidat')->group(function(){
    Route::get('postuler/success',[PostullerController::class,'success'])->name('postuler.success');

});

Route::prefix('superviseur')->name('superviseur.')->middleware('auth')->middleware('superviseur')->group(function(){
    Route::get('valider',[SuperviseurActionsController::class,'valider'])->name('valider.candidature');
    Route::get('/users/data', [SuperviseurActionsController::class, 'getData'])->name('users.data');
    Route::delete('/etudiant/{id}', [SuperviseurActionsController::class, 'destroy'])->name('users.destroy');
    Route::post('/candidat/{id}/validate', [SuperviseurActionsController::class, 'validateCandidate'])->name('users.validate');


});
