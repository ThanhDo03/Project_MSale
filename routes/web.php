<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema; 
use Illuminate\Database\Schema\Blueprint;
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
Route::get('/',[CustomerController::class, 'Customer'])->name('customer');

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

// Update Product
Route::get('/UpdateProdcut/{id}', [ProductController::class , 'edit'])->name('update.product');
Route::post('/UpdateProductSuccess', [ProductController::class, 'update'])->name('update.product.success');

// Delete Product
Route::get('/DeleteProduct/{id}',[ProductController::class, 'delete'])->name('delete.product');

// Search Product Customer
Route::post('/CustomerSearch',[UserController::class, 'search'])->name('customer.search');
Route::get('/Import', function () {
    return view('admin.import_product');
})->name('import.product');

// Create DataBase
Route::get('/addBill',function(){
    Schema::create('bill', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('product_name');
        $table->integer('customer_id');
        $table ->foreign('customer_id')->references('id')->on('customer');
        $table->integer('staff_id');
        $table->string('status');
        $table->integer('amount');
        $table->string('size');
        $table->timestamps();
    });
});

Route::get('/addCus',function(){
    Schema::create('customer', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->string('name');
        $table->string('sex');
        $table->string('address');
        $table->string('phone_number');
        $table->string('email');
        $table->timestamps();
    });
});

// Cart Product
Route::get('/CartProduct/{id_product}',[CustomerController::class, 'cart'])->name('cart.product');

// Show Cart Product
Route::get('/ShowCart/{id_customer}',[CustomerController::class,'showCart'])->name('show.cart');
Route::get('/ShowCart',[CustomerController::class,'showCart_1']);