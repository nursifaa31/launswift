<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;


class LoginC extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function loginAksi(Request $request)
    {
        Validator::make($request->all(),[
            'username' => 'required',
            'password' => 'required'
        ])->validate();


        if (!Auth::attempt($request->only('username','password'), $request->boolean('remember'))) {
            throw ValidationException::withMessages([
            ]);
        }

        $request->session()->regenerate();

        return redirect()->route('dashboard');
    }

    public function logout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();

        return redirect('/');
    }
}
