<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogonRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function logon(LogonRequest $request)
    {
        if ($request->has('logon')) {
            dd(Auth::attempt(['email' => $request->email, 'password' => $request->password]));
            if (Auth::attempt($request->email, $request->password)) {
                
            }
            return back()->withInput()->withErrors(['password' => 'メールアドレスまたはパスワードが正しくありません']);
        }

    }
}
