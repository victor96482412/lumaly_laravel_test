<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $login = $request->get('login');
        $password = $request->get('password');

        if (Auth::attempt(['name' => $login, 'password' => $password])) {
            $user = auth()->user();
            $token = Str::random(60);
            $user->remember_token = $token;
            $user->save();
            return response(['token' => $token]);
        }

        return response(['message' => 'Unauthenticated'], 403);
    }
}
