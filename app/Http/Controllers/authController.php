<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class authController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }
    public function welcome()
    {
        $user=user::all();
        return view('welcome',compact('user'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
    public function authLogin(Request $request)
    {
        $validasi = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($validasi)) {
            $request->session()->regenerate();
            if (auth()->user()->level == 'user') {
                return redirect()->intended('/welcome');
            } else {
                return redirect()->intended('/welcome');
            }
        } else {
            return back()->with('gagal', 'login anda gagal!');
        }
    }
    public function registerPost(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required'
        ]);

        $user = new User;
        $user -> name = $request -> name;
        $user -> email = $request -> email;
        $user -> password = bcrypt($request -> password);
        $user->level="user";
        $user -> save($validatedData);
        return redirect('/login');
    }
    public function register()
    {
        return view('auth/register');
    }
}
