<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Cart_Items;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    // Customer
    public function Customer()
    {
        $product = Product::all();
        $cart_items = Cart_Items::all();
        return view('customer.shop', compact('product', 'cart_items'));
    }

    // Cart
    public function cart(Request $req, $id_product)
    {
        if (Auth::user()) {
            $product_id = $id_product;
            $cart_items = new Cart_Items();
            $cart_items->product_id = $product_id;
            $cart_items->customer_id = $req->customer_id;
            $cart_items->save();
            $product = Product::all();
            return view('customer.shop', compact('product'));
        } else {
            return redirect()
                ->route('welcome')
                ->with('error1', 'You need to log in before adding the product!');
        }
    }

    // Show Cart
    public function showCart($id)
    {
        if (Auth::user()) {
            $data = DB::table('cart_items')->where('customer_id', $id)->get();
            if ($data) {
                $cart_items = DB::table('cart_items')->where('customer_id', $id)->get();
                return view('customer.cart', compact('cart_items'));
            } 
        } else {
            return redirect()
                ->route('welcome')
                ->with('error1', 'You need to log in before adding the product!');
        }
    }

    public function showCart_1()
    {
        if (!Auth::user()) {
            return redirect()
            ->route('welcome')
            ->with('error1', 'You need to be logged in to view your shopping cart!');
        } 
    }
}
