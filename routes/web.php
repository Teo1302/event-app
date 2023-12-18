<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\EvenimentController;
use App\Http\Controllers\SponsorController;
use App\Http\Controllers\PartenerController;
use App\Http\Controllers\SpeakerController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\BiletController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaginaUtilizatorController;
use App\Http\Controllers\CartController;
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

Route::get('/', [AgendaController::class, 'index']);
Route::resource('agende', AgendaController::class);

Route::get('/', [BiletController::class, 'index']);
Route::resource('bilete', BiletController::class);


Route::get('/pagina_goala', function () {return view('pagina_goala');})->name('pagina_goala');
Route::get('/pagina_utilizator', function () {return view('pagina_utilizator');})->name('pagina_utilizator');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::post('/cart/update/{id}', [CartController::class, 'updateCart'])->name('cart.updateCart');
Route::post('/cart/viewCart/{id}', [CartController::class, 'viewCart'])->name('cart.viewCart');



Route::get('/', function () {return view('welcome');});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function ()
{
    Route::get('/dashboard', function ()
    {
        return view('dashboard');
    })->name('dashboard');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::group(['middleware' => 'auth'], function(){
    Route::get('/', [PaginaUtilizatorController::class, 'index']);
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('is_admin')->group(function () {
    // Your admin routes go here
    Route::resource('sponsori', SponsorController::class)->only(['edit', 'show', 'create']);
    Route::resource('parteneri', PartenerController::class)->only(['edit', 'show', 'create']);
    Route::resource('speakeri', SpeakerController::class)->only(['edit', 'show', 'create']);
    Route::resource('evenimente', EvenimentController::class)->only(['edit', 'show', 'create']);
    Route::resource('agende', AgendaController::class)->only(['edit', 'show', 'create']);
});


