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
    return view('index');
});
Route::get('/showuser', [\App\Http\Controllers\ListeVisitorController::class, 'show']);
Route::get('/showfiche/{value}', [\App\Http\Controllers\FicheController::class, 'show']);
Route::get('/showfrais/{value}', [\App\Http\Controllers\FraisController::class, 'show']);
Route::get('index.blade.php', function () {
    return view('index');
});

