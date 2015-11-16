<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Laravel\Lumen\Routing\ValidatesRequests;

class AuthStuff extends Controller
{
    use ValidatesRequests;

    public function login()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        if (app('auth')->attempt($request->only('email', 'password'))) {
            return redirect()->route('profile');
        } else {
            return view('login')->withErrors(['message' => 'User name and password combo did not match']);
        }
    }

    public function logout()
    {
        app('auth')->logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        $validation_rules = [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ];
        $this->validate($request, $validation_rules);

        try {
            if ($user = User::create($request->only('first_name', 'last_name', 'email', 'password'))) {
                app('auth')->attempt($request->only('email', 'password'));
                return redirect()->route('profile');
            }
        } catch (\Exception $e) {
            jsErrors($e->getMessage());
            return redirect()->route('login')->withErrors(['message' => $e->getMessage()]);
        }
    }
}