<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartenerController;
use App\Http\Controllers\SpeakerController;

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
Route::get('/', [EvenimentController::class, 'index']);
// Rutele pentru resurse (CRUD)
Route::resource('evenimente', EvenimentController::class);

Route::get('/', [SponsorController::class, 'index']);
Route::resource('sponsori', SponsorController::class);

Route::get('/', [PartenerController::class, 'index']);
Route::resource('parteneri', PartenerController::class);

Route::get('/', [SpeakerController::class, 'index']);
Route::resource('speakeri', SpeakerController::class);


Route::get('/', function () {return view('welcome');});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
