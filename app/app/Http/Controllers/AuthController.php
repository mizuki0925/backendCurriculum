<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth/index');
    }

    public function login(Request $request = null)
    {
        if (is_null($request)) {
            return view('auth/login');
        }

        
    }

    public function logout()
    {
    }
}
