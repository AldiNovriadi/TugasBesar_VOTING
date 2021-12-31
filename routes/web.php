<?php

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

Route::get('/voting/login', [LoginController::class, 'index']);
Route::get('/voting/google', [LoginController::class, 'google']);
Route::get('/voting/proces/{id}', [VotingController::class, 'proces']);
Route::get('/voting/result/{id}', [VotingController::class, 'result']);
Route::Resource('/voting', VotingController::class);
Route::Resource('/options', OptionController::class);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
