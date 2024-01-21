<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class LoginController extends Controller
{
    //
    public function index()
    {
        return view('auth.login', [
            'title' => 'Inventory | Login'
        ]);
    }

    public function autenticate(Request $request)
    {
        $validasi = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        } else {
            return redirect()->back()->with('loginError', 'Login Gagal');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Inventory | Register',

        ]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|min:5|max:100',
            'email' => 'required|unique:users',
            'password' => 'required|min:5|max:100'
        ]);
        $validasi['password'] = Hash::make($validasi['password']);
        User::create($validasi);

        return redirect('/')->with('success', 'Register Berhasil, Silahkan Login');
    }
}
