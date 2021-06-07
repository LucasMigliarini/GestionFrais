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

Route::get('/home', [\App\Http\Controllers\DefaultController::class, 'show'])->middleware('auth')->name('home');

Route::get('/', [\App\Http\Controllers\DefaultController::class, 'show'])->middleware('auth');
//Comptabilité
Route::get('/showfiche', [\App\Http\Controllers\FicheController::class, 'show'])->middleware('comptable')->name('showfiche');
Route::get('/showfrais/{value}', [\App\Http\Controllers\FraisController::class, 'show'])->middleware('comptable')->name('showfrais');
Route::get('/showallfiche', [\App\Http\Controllers\FicheController::class, 'showall'])->middleware('comptable');

Route::get('/editfrais/{value}', [\App\Http\Controllers\FraisController::class, 'showEditFraisForfaitaire'])->middleware('comptable');
Route::post('/doeditfrais/{value}', [\App\Http\Controllers\FraisController::class, 'doEditFraisForfaitaire'])->middleware('comptable');

Route::get('/edithorsfrais/{value}', [\App\Http\Controllers\FraisController::class, 'showEditHorsFrais'])->middleware('comptable');
Route::post('/doedithorsfrais/{value}', [\App\Http\Controllers\FraisController::class, 'doEditHorsFrais'])->middleware('comptable');

Route::get('/veriffrais/{value}', [\App\Http\Controllers\FraisController::class, 'validerFiche'])->middleware('comptable');
Route::get('/verifefrais/{value}', [\App\Http\Controllers\FraisController::class, 'refuserFiche'])->middleware('comptable');

Route::get('/allfrais', [\App\Http\Controllers\FraisController::class, 'showAllFrais'])->middleware('comptable');


//Visiteur
Route::get('/showfichevisitor/{value}', [\App\Http\Controllers\FicheController::class, 'showVisiteur'])->middleware('visiteur')->name('showfichevisitor');
Route::get('/showfraisvisitor/{value}', [\App\Http\Controllers\FraisController::class, 'showVisitor'])->middleware('visiteur');
Route::get('/shownewfiche/', [\App\Http\Controllers\FicheController::class, 'newfiche'])->middleware('visiteur');

Route::post('/newfrais/', [\App\Http\Controllers\FicheController::class, 'createFiche'])->middleware('visiteur');

//Admin
Route::get('/showusers', [\App\Http\Controllers\UsersController::class, 'show'])->middleware('admin')->name('showusers');

Route::get('/edituser/{value}', [\App\Http\Controllers\UsersController::class, 'showEdituser'])->middleware('admin');
Route::post('/doedituser/{value}', [\App\Http\Controllers\UsersController::class, 'doEdituser'])->middleware('admin');

Route::get('/register', [\App\Http\Controllers\UsersController::class, 'showregister'])->middleware('admin')->name('register');
Route::post('/doregister', [\App\Http\Controllers\UsersController::class, 'doregister'])->middleware('admin');


