<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account/index');
    }

    public function regist()
    {
        return view('account/regist');
    }

    public function edit()
    {
        return view('account/edit');
    }

    public function spec()
    {
        return view('account/spec');
    }

    public function login()
    {
        return view('account/login');
    }
}
