<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('login');
    }

    public function login_process(Request $req){
        $req->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);
        $credentials = $req->only('email','password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended(route('dashboard'));
        }
        return redirect()->route('login',['msg'=>'Invalid Email or Password','color'=>'text-danger']);
    }

    public function dashboard(){
        return view('dashboard');
    }

    public function logout(){
        session()->flush();
        Auth::logout(); 
        return redirect()->route('home');
    }

    public function register(){
        if (Auth::check()) {
            return redirect(route('dashboard'));
        }
        return view('register');
    }

    public function register_process(Request $req){
        $req->validate([
            'first_name'      => 'required',
            'last_name'       => 'required',
            'email'           => 'required|email|unique:users',
            'password'        => 'required|min:8',
            'gender'          => 'required',
            'date_of_birth'   => 'required|date',
            'profile_picture' => 'required|mimes:jpg,jpeg,png|max:1024',
            'address'         => 'required'
        ]);

        $file_name = time().".".$req->file('profile_picture')->getClientOriginalExtension();
        $req->file('profile_picture')->storeAs('public/pictures',$file_name);

        $user = DB::table('users')->insert(
            [
                'first_name'      => $req->first_name,
                'last_name'       => $req->last_name,
                'email'           => $req->email,
                'password'        => Hash::make($req->password),
                'gender'          => $req->gender,
                'date_of_birth'   => $req->date_of_birth,
                'address'         => $req->address,
                'profile_picture' => $file_name
            ]
        );
        if (!$user) {
            return redirect(route('register',['msg'=>'Registration Failed','color'=>'text-danger']));
        }
        return redirect(route('login',['msg'=>'Registration Successful You can login now','color'=>'text-success']));
    }

}
