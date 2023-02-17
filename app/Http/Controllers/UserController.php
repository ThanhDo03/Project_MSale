<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Sign In
    public function login(Request $req){
        if (Auth::attempt(['email'=>$req->email_name, 'password'=>$req->pwd])){
            return view('admin.management');
        }else{
            return redirect()->route('login')->with('error', 'Invalid username or password :((');
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
                return redirect()->route('welcome')->with('error', 'Account exist!');
            }
        }
    }
}
