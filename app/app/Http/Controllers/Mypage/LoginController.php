<?php

namespace App\Http\Controllers\Mypage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //ログインページの表示
    public function index()
    {
        //ログインしていない時のリダイレクト先
        if (Auth::guard('members')->user()) {
            return redirect()->route('mypage.dashboard');
        }
        return view('mypage.login.index');
    }

    //ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only(['email','password']);

        //ユーザー情報が見つかったらログイン
        if(Auth::guard('members')->attempt($credentials)) {
            //ログイン後に表示するページにリダイレクト
            return redirect()->route('mypage.dashboard')->with([
                'login_msg' => 'ログインしました',
            ]);
        }

        //ログインできなかったときに元のページに戻る
        return back()->withErrors([
            'login' => ['ログインに失敗しました'],
        ]);
    }

    //ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('members')->logout();
        $request->session()->regenerateToken();

        //ログインページにリダイレクト
        return redirect()->route('mypage.login.index')->with([
            'auth' => ['ログインしました'],
        ]);
    }
}
