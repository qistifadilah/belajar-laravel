<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CastController,
    GenreController,
    AuthController,
    FilmController,
    PeranController,
    KritikController,
    ProfileController
};
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/home', function() {
//     return view('home');
// });

// Route::get('/about', function() {
//     return view('about');
// });

// Route::get('/', function () {
//     return view('layout.master');
// });

// Route::get('/', function () {
//     return view('user.index');
// });

// Route::get('welcome', function () {
//     return view('user.welcome');
// });

// Route::get('/form', function () {
//     return view('user.form');
// })-> name('get-form');

Route::resource('/cast', CastController::class)->middleware('auth');
Route::resource('/genre', GenreController::class)->middleware('auth');
Route::resource('/film', FilmController::class)->middleware('auth');

Route::controller(AuthController::class)->group(function(){
    //register form
    Route::get('/register', 'register')->name('auth.register');

    //store register
    Route::post('/register', 'store')->name('auth.store');

    //login form
    Route::get('/login', 'login')->name('auth.login');

    //auth process
    Route::post('/auth', 'auth')->name('auth.authentication');

    //logout
    Route::post('/logout', 'logout')->name('auth.logout');

    //dashboard
    Route::get('/dashboard', 'dashboard')->name('auth.dashboard');
});

Route::get('/film/{film}/peran/create', [PeranController::class, 'create'])->name('peran.create')->middleware('auth');
Route::post('/film/{film}/peran', [PeranController::class, 'store'])->name('peran.store')->middleware('auth');

Route::get('/film/{film}/kritik/create', [KritikController::class, 'create'])->name('kritik.create')->middleware('auth');
Route::post('/film/{film}/kritik', [KritikController::class, 'store'])->name('kritik.store')->middleware('auth');

Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('user.profile')->middleware('auth');