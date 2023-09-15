<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    CastController,
    GenreController,
};

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

// Route::get('/', function () {
//     return view('welcome');
// });

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

Route::resource('/cast', CastController::class);
Route::resource('/genre', GenreController::class);