<?php

namespace App\Traits;

use App\Models\Account;
use App\Exceptions\AccountInvalidException;
use Illuminate\Support\Facades\Auth;

trait UserRoleTrait
{
    //ユーザーの権限
    public function getUserRole(Account $user): string
    {
        switch ($user->role) {
            case 1:
                return '管理者';
            case 2:
                return '一般';
            default:
                return '不明';
        }
    }

    /**
     * ログインユーザーの権限を取得
     * 
     * @return string
     */
    public static function getLoginUserRole(): string
    {
        $user = Auth::user();

        if (is_null($user)) {
            return '不明';
        }

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
    public function setRoleName(array $accounts): array
    {
        foreach ($accounts as $account) {
            static::isAccountModel($account);
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

    /**
     * アカウントモデルでない場合エラーを投げる
     *
     * @param mixed $variable チェック対象の変数
     * @return void
     * @throws AccountInvalidException アカウントモデルでない場合
     */
    private static function isAccountModel($variable)
    {
        if (!$variable instanceof Account) {
            throw new AccountInvalidException();
        }
    }
}
