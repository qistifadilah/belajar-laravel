<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except([
            'logout',
            'dashboard'
        ]);
    }

    //register form
    public function register(){
        return view('auth.register');
    }

    //store register
    public function store(Request $request, User $user, Profile $profile){
        $request->validate([
            'name'      => 'required|string|max:250',
            'email'     => 'required|email|max:250|unique:users,email',
            'password'  => 'required|min:8',
            'umur'      => 'required',
            'bio'       => 'required|min:10',
            'alamat'    => 'required|min:10'
        ]);

        // save data profile
        $profile->bio       = $request->bio;
        $profile->alamat    = $request->alamat;
        $profile->umur      = $request->umur;
        $profile->save();
        // save data user
        $user->profile_id   = $profile->id;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        return redirect()->route('auth.dashboard')->withSuccess('Anda telah registrasi dan login.!');;
    }

    //login form
    public function login(){
        return view('auth.login');
    }

    //login process
    public function auth(Request $request, Auth $auth){
        // validasi form input
        $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required|min:8'
        ]);

        // proses authentikasi
        $credentials = $request->only('email', 'password');
        if ($auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('auth.dashboard');
        };

        // jika proses authentikasi gagal maka akan di redirect ke halaman login
        return back()->withErrors([
            'email' => 'Email atau password tidak ditemukan'
        ])->onlyInput('email');
    }

    //logout
    public function logout(Request $request, Auth $auth){
        $auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('auth.login');
    }
    
    //dashboard
    public function dashboard(){
        if (Auth::check()) {
            return view('auth.dashboard');
        }

        return redirect()->route('auth.login');
    }
}
