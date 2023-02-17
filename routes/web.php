<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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

// Sign Up
Route::post('/SignUp',[UserController::class, 'store'])->name('auth.signup');
Route::get('/Home', function () {
    return view('admin.management');
})->name('admin');
// Sign In
Route::post('/SignIn',[UserController::class, 'login'])->name('auth.signin');
Route::get('/Welcome', function () {
    return view('welcome');
})->name('login');

Route::get('/', function () {
    return view('welcome');
})->name('welcome');