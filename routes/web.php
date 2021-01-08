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

Route::get('/home', [\App\Http\Controllers\DefaultController::class, 'show'])->middleware('auth');

Route::get('/', [\App\Http\Controllers\DefaultController::class, 'show'])->middleware('auth');
//Comptabilité
//Route::get('/showuser', [\App\Http\Controllers\ListeVisitorController::class, 'show'])->middleware('comptable')->name('showuser');
Route::get('/showfiche/', [\App\Http\Controllers\FicheController::class, 'show'])->middleware('comptable');
Route::get('/showfrais/{value}', [\App\Http\Controllers\FraisController::class, 'show'])->middleware('comptable')->name('showfrais');

Route::get('/editfrais/{value}', [\App\Http\Controllers\FraisController::class, 'showEditFraisForfaitaire'])->middleware('comptable');
Route::post('/doeditfrais/{value}', [\App\Http\Controllers\FraisController::class, 'doEditFraisForfaitaire'])->middleware('comptable');

Route::get('/edithorsfrais/{value}', [\App\Http\Controllers\FraisController::class, 'showEditHorsFrais'])->middleware('comptable');
Route::post('/doedithorsfrais/{value}', [\App\Http\Controllers\FraisController::class, 'doEditHorsFrais'])->middleware('comptable');

Route::get('/veriffrais/{value}', [\App\Http\Controllers\FraisController::class, 'validerFiche'])->middleware('comptable');
Route::get('/verifefrais/{value}', [\App\Http\Controllers\FraisController::class, 'refuserFiche'])->middleware('comptable');


//Visiteur
Route::get('/showfichevisitor/{value}', [\App\Http\Controllers\FicheController::class, 'showVisiteur'])->middleware('visiteur');
Route::get('/showfraisvisitor/{value}', [\App\Http\Controllers\FraisController::class, 'showVisitor'])->middleware('visiteur');
Route::get('/shownewfiche/', [\App\Http\Controllers\FicheController::class, 'newfiche'])->middleware('visiteur');
Route::post('/newfrais/', [\App\Http\Controllers\FicheController::class, 'createFiche'])->middleware('visiteur');



