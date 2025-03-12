<?php

namespace App\Http\Controllers\Auth;

use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (!empty(Auth::check())) {
            return redirect('panel/dashboard');
        }
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function auth_login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|same:password'
        ]);

        // $data['password'] = Hash::make($request->password);
        // dd($data);

        $remember = !empty($request->remember) ? true : false;
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
            return redirect('panel/dashboard');
        } else {
            return redirect()->back()->with('error', 'Email or password is incorrect');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
