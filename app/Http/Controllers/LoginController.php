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
    public function validating(Request $request){
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

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
