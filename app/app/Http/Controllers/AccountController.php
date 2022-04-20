<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountController extends Controller
{
    public function index()
    {
        $users = Account::get()->first();
        dd($users);

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
}
