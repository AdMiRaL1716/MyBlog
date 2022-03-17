<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        return UserService::register($request);
    }

    public function login(Request $request)
    {
        return UserService::login($request);
    }

    public function logout()
    {
        return UserService::logout();
    }
}
