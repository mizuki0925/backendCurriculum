<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Pagination\Paginator;

class AccountController extends Controller
{
    public function index()
    {
        $accounts = Account::paginate(10);

        return view('account/index', compact('accounts'));
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
