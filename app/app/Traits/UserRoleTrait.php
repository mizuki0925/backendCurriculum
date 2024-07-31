<?php

namespace App\Traits;

use App\Models\Account;
use App\Exceptions\AccountInvalidException;

trait UserRoleTrait
{
    //ログインユーザーの権限
    public function getUserRole(Account $user): string
    {
        static::ensureAccountModel($user);
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
            static::ensureAccountModel($account);
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
     * アカウントモデルでない場合エラー
     *
     * @param [type] $variable
     * @return void
     */
    private static function ensureAccountModel($variable)
    {
        if (!$variable instanceof Account) {
            throw new AccountInvalidException();
        }
    }
}
