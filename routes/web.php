<?php

use App\Http\Controllers\GoogleController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\VotingController;
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


Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// Route::post('/logout', [GoogleController::class, 'logout'])
//     ->middleware('auth')
//     ->name('logout');

Route::get('/voting/proces/{id}', [VotingController::class, 'proces']);
Route::post('/voting/vote', [VotingController::class, 'vote']);
Route::get('/voting/result/{id}', [VotingController::class, 'result']);
Route::Resource('/voting', VotingController::class)->middleware('auth');
Route::Resource('/options', OptionController::class);



// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
