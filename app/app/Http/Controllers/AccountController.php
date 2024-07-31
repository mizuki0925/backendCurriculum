<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\AccountCreateRequest;
use App\Http\Requests\AccountUpdateRequest;
use App\Http\Requests\LoginRequest;
use App\Traits\UserRoleTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * アカウントコントローラークラス
 */
class AccountController extends Controller
{
    // TODO：③書き方
    //トレイトを使用する ← 不要コメント
    use UserRoleTrait;

    /**
     * アカウント一覧画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        // ログインユーザーを取得
        $user = Auth::user();
        // ログインユーザーの権限名を取得
        $role = $this->getUserRole($user);
        // 全アカウントを取得
        $accounts = Account::paginate(10);

        // TODO:③定数化の説明
        // アカウント情報の権限を取得
        // $accounts = $this->setRoleName($accounts);

        // \Log::debug(TEST_1);

        return view('account/index', [
            'user' => $user,
            'accounts' => $accounts,
            'role' => $role,
        ]);
    }

    /**
     * 新規登録フォーム表示用
     *
     * @return void
     */
    public function regist(): View
    {
        return view('account/regist');
    }

    /**
     * 新規登録処理
     *
     * @param AccountCreateRequest $request
     * @return RedirectResponse
     */
    public function create(AccountCreateRequest $request): RedirectResponse
    {
        //データを取得
        $data = $request->validated();

        // TODO:③返却値を変数に格納した意味は？
        //登録内容をデータベースに作成
        $account = Account::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'tel' => $data['tel'],
            'role' => $data['role'],
        ]);

        //登録が成功したらリダイレクトする
        return redirect()->route('account.index')->with([
            'success' => 'アカウントを登録しました',
        ]);
    }

    //ログインページの表示
    public function login()
    {
        return view('account/login');
    }

    //ログイン処理
    public function loginSubmit(LoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        //ユーザー情報が見つかったらログイン
        if (Auth::attempt($credentials)) {
            //ログイン後に表示するページにリダイレクト
            return redirect()->route('account.index')->with([
                'login_msg' => 'ログインしました',
            ]);
        }

        //ログインできなかったときに元のページに戻る
        return back()->withErrors([
            'login' => 'ログインに失敗しました',
        ]);
    }
    //ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('accounts')->logout();
        $request->session()->regenerateToken();

        //ログインページにリダイレクト
        return redirect()->route('account.login')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }

    // アカウント編集画面表示
    public function edit($accountId)
    {
        $account = Account::find($accountId);
        // ログインユーザーを取得
        $user = Auth::user();
        // ログインユーザーの権限名を取得
        $role = $this->getUserRole($user);

        return view(
            'account/edit',
            compact('account', 'user', 'role'),
        );
    }

    // アカウントの更新
    public function update(AccountUpdateRequest $request, $accountId)
    {
        $data = $request->validated();
        $account = Account::find($accountId);

        // ポリシーを使用して管理者かどうかをチェック
        $this->authorize('update', $account);

        $account->update([
            'name' => $data['name'] ?? $account->name,
            'email' => $data['email'] ?? $account->email,
            'tel' => $data['tel'] ?? $account->tel,
            'role' => $data['role'] ?? $account->role,
        ]);

        // パスワードが入力されている場合のみ更新
        if (!empty($data['password'])) {
            $account->update([
                'password' => Hash::make($data['password']),
            ]);
        }

        $account->save();
        return redirect()->route('account.index')->with([
            'success' => 'アカウントが更新されました',
        ]);
    }

    //アカウントの削除
    public function delete($accountId)
    {
        $account = Account::find($accountId);
        $account->delete();
        return redirect()->route('account.index')->with([
            'success' => 'アカウントを削除しました',
        ]);
    }

    //アカウント詳細画面表示
    public function spec($accountId)
    {
        //アカウント情報を取得
        $account = Account::find($accountId);
        // ログインユーザーを取得
        $user = Auth::user();
        // ログインユーザーの権限名を取得
        $role = $this->getUserRole($user);
        // アカウント情報の権限を取得
        $this->setRoleName([$account]);

        return view('account/spec', compact('account', 'user', 'role'));
    }

    //CSV出力
    public function downloadCsv()
    {
        $accounts = Account::all();
        $csvHeader = ['id', 'name', 'email', 'tel', 'role', 'created_at', 'updated_at'];
        $csvData = $accounts->toArray();

        $callback = function () use ($csvHeader, $csvData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return Response::streamDownload($callback, 'accounts.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
