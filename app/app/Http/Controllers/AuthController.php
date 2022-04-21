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

    public function login()
    {

    }
    
    public function logout()
    {

    }

}
