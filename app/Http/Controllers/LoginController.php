<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }
    public function logValidate(Request $request){
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if(Auth::Attempt($data)){
            return redirect('home');
        }
        else{
            Session::flash('error', 'Wrong Email/Password');
            return redirect('login');
        }
    }

    public function register(){
        return view('register');
    }
    public function regValidate(Request $request){
        $proceed = false;
        $icon = "default-profile.png";
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
        if($request->input('password') == $request->input('confirm_password')){
            if(User::where('username', $request->username)->count() > 0){
                Session::flash('error', 'Username already used');
            }
            else{
                if(User::where('email', $request->email)->count() > 0){
                    Session::flash('error', 'Email already used');
                }
                else{
                    User::create([
                        'full_name' => $request->full_name,
                        'username' => $request->username,
                        'email' => $request->email,
                        'password' => Hash::make($request->password),
                    ]);
                    if(Auth::Attempt($data)){
                        $proceed = true;
                    }
                }
            }
        }
        else{
            Session::flash('error', "Password doesn't match");
        }
        if($proceed){
            return redirect('home');
        }
        else{
            return redirect('register');
        }
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
