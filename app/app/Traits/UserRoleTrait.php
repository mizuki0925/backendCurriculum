<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait UserRoleTrait
{
    //ログインユーザーの権限
    public function getUserRole()
    {
        $user = Auth::user();

        switch ($user->role) {
            case 1:
                return '管理者';
            case 2:
                return '一般';
            default:
                return '不明';
        }
    }

    // TODO:③定数化の説明
    //アカウント情報の権限
    public function setRoleName($accounts)
    {
        foreach ($accounts as $account) {
            switch ($account->role) {
                case 1:
                    $account->role = '管理者';
                    break;
                case 2:
                    $account->role = '一般';
                    break;
                default:
                    $account->role = '不明';
                    break;
            }
        }
        return $accounts;
    }
}
