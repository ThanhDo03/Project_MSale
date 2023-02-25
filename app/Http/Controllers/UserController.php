<?php

namespace App\Http\Controllers;

use App\Models\Cart_Items;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Sign In
    public function login(Request $req){
        if (Auth::attempt(['email'=>$req->email_name, 'password'=>$req->pwd])){
            if(Auth::check()){
                if(Auth::user()->role == 1){
                    $products = Product::all();
                    return view('admin.management', compact('products'));
                }else{
                    return redirect()->route('customer')->with('msg','');
                }
            }
        }else{
            return redirect()->route('welcome')->with('error', 'Invalid username or password :((');
        }
    }

    // Sign Up
    public function store(Request $request){
        if ($request->isMethod('POST')){
            $user = DB::table('users')->where('email', $request->email)->first();
            if (!$user){
                $newUser = new User();
                $newUser->email = $request->email;
                $newUser->name = $request->name;
                $newUser->password = $request->password;
                $newUser->save();
                return redirect()->route('admin')->with('message', 'Create account success!');
            }else{
                return redirect()->route('welcome')->with('error1', 'Account exist!');
            }
        }
    }

    // Upload Product
    public function UploadProduct(){
        return view('admin.add_product');
    }

    public function search(Request $request){
        $search = $request->ProductSearch;
        $product = Product::where('product_name', 'LIKE', '%'.$search.'%')->get();
        return view('customer.search_product', compact('product'), ['successMsg'=>'Search results for'.$search]);
    }
}

