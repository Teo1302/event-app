<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\SponsorController;

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



Route::get('/', function () {return view('welcome');});
