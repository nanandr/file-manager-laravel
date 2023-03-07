<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use AuthenticatesUsers;
use Session;
use File as FileStorage;

class LoginController extends Controller
{
    protected function authenticated(){
        if(Auth::check()){
            return redirect('home');
        }
        else{
            return redirect('login');
        }
    }

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
                    if($request->file('file') != null){
                        $this->validate($request, [
                            'file' => 'required|file|image|mimes:jpeg,png,jpg',
                        ]);

                        $file = $request->file('file');
                        $file_enc = time() . "_" . $file->getClientOriginalName();
                        
                        User::create([
                            'full_name' => $request->full_name,
                            'username' => $request->username,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                            'icon_route' => $file_enc,
                        ]);

                        $file->move('profiles', $file_enc);
                    }
                    else{
                        User::create([
                            'full_name' => $request->full_name,
                            'username' => $request->username,
                            'email' => $request->email,
                            'password' => Hash::make($request->password),
                        ]);
                    }

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

    public function edit($id, Request $request){
        $user = User::find($id);
        $user->full_name = $request->full_name;
        $user->username = $request->username;
        $user->email = $request->email;

        if($request->file('icon_route') != null){
            $this->validate($request, [
                'icon_route' => 'file|image|mimes:jpeg,png,jpg',
            ]);

            $file = $request->file('icon_route');
            $file_enc = time() . "_" . $file->getClientOriginalName();
            if($user->icon_route != 'default-profile.png'){
                FileStorage::delete('profiles/'.$user->icon_route);
            }
            $file->move('profiles', $file_enc);
            $user->icon_route = $file_enc;
        }
        if($request->oldpassword != null && $request->newpassword != null){
            if(Hash::check($request->oldpassword, Auth::user()->password)){
                $user->password = Hash::make($request->newpassword);
                Auth::logout();             
                Session::flash('success', "Password changed");
            }
        }

        $user->save();
        return redirect()->back();
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    }
}
