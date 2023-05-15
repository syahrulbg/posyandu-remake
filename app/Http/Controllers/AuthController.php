<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ibu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index(){
        if (Auth::user()) {
            return redirect()->intended('home');
        }
        return view('auth.login', [
            'title' => 'Login'
        ]);
    }

    public function proses(Request $request)
    {
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required',
            ]);
        
        $kredensial = $request->only('email', 'password');
        if(Auth::attempt($kredensial)) {
            $request->session()->regenerate();
            $user = Auth::user();
            if($user){
                return redirect()->intended('/home');
            }
            
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email salah',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function daftar()
    {
        return view('auth.register');
    }

    public function daftarPosyandu(Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'role_id' => 'required',
            'ibu_id' => 'required',
            'name' => 'required|string',
            'jenis_kelamin' => 'required',
        ]);

        $user = new User([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id,
            'ibu_id' => $request->ibu_id,
        ]);

        $ibu = new Ibu([
            'id' => $request->ibu_id,
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);    
        // dd($user);
        // dd($ibu);
        $user->save();
        $ibu->save();

        return redirect()->route('login')->with('success', 'Registration success. Please login!');

        return back()->withErrors([
            'Email' => 'Email telah terdaftar!',
        ])->onlyInput('Email');
    }
}
