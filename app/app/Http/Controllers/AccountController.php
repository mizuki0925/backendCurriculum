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
        $accounts = Account::orderBy('id', 'desc')->paginate(10);
        return view('account/index', compact('accounts'));
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
            return redirect('account')->with('flashMessage', 'アカウントの登録が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', 'アカウントの登録に失敗しました');
        }
    }

    public function edit($id)
    {
        $account = Account::find($id);
        return view('account/edit', compact('account'));
    }

    public function update(AccountRequest $request)
    {
        if ($request->has('delete')) {
            return $this->delete($request);
        }
        try {
            $account = Account::find($request->id);
            $account->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'tel' => $request->tel,
                'role' => $request->role
            ]);
            return redirect("account/edit/$account->id")->with('flashMessage', 'アカウントの更新が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', 'アカウントの更新に失敗しました');
        }
        return view('account/edit', compact('account'));
    }

    public function delete(Request $request)
    {
        // 削除処理
        try {
            $account = Account::find($request->id);
            $account->delete();
            return redirect("account")->with('flashMessage', 'アカウントの削除が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', 'アカウントの削除に失敗しました');
        }
    }

    public function spec($id)
    {
        $account = Account::find($id);
        return view('account/spec', compact('account'));
    }

    public function login()
    {
        return view('account/login');
    }

    public function logon(LogonRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect('account')->with('flashMessage', 'ログインが完了しました');
        }
        return back()->withInput()->withErrors(['password' => 'メールアドレスまたはパスワードが正しくありません']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('account/login')->with('flashMessage', 'ログアウトしました');
    }

    public function csvDownlord()
    {
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=accounts.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function () {
            $file = fopen('php://output', 'w');
            $accounts = Account::orderBy('id', 'desc')->get();
            $columns = [
                'ＩＤ',
                '名前',
                'メールアドレス',
                '電話番号',
                '権限'
            ];
            mb_convert_variables('SJIS', 'UTF-8', $columns);
            // カラムを書き込み
            fputcsv($file, $columns);
            foreach ($accounts as $account) {
                $data = [
                    $account->id,
                    $account->name,
                    $account->address,
                    $account->tel,
                    config("curriclum.role.$account->role")
                ];
                mb_convert_variables('SJIS-win', 'UTF-8', $data);
                // データを書き込み
                fputcsv($file, $data);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
