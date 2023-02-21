<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
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
// Display Welcome
Route::get('/Welcome', function () {
    return view('welcome');
})->name('welcome');
// Upload Product
Route::get('/ShowAddProduct',[UserController::class, 'UploadProduct'])->name('upload.Product');
// Customer
Route::get('/',[UserController::class, 'Customer'])->name('customer');

// Show Product
Route::get('/HomeAdmin', function(){
    $products = Product::all();
    return view('admin.management', compact('products'));
})->name('home.admin');
// Logout
Route::get('/Logout', function(){
    Auth::logout();
    return redirect()->route('welcome');
})->name('logout');

// Upload Product
Route::post('/UploadProduct',[ProductController::class, 'store'])->name('add.product');