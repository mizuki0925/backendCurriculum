<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogonRequest;
use App\Http\Requests\AccountRequest;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
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
    public function add(AccountRequest $request)
    {
        try {
            $account = new Account();
            $account->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tel' => $request->tel,
                'role' => $request->role
            ]);
            return redirect('account/login')->with('flashMessage', '登録が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', '登録が失敗しました');
        }
        // アカウント作成処理
        return view('account/index');
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
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect('account')->with('flashMessage', 'ログインが完了しました');
            }
            return back()->withInput()->withErrors(['password' => 'メールアドレスまたはパスワードが正しくありません']);
        }
    }
}
