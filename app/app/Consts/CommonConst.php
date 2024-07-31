<?php

namespace App\Consts;

/**
 * 定数を定義するクラス
 */
class CommonConst
{
    // TODO:③定数化の説明
    public const ACCOUNT_ROLE_ADMIN = 1;
    public const ACCOUNT_ROLE_GENERAL = 2;
    /**
     * 権限名のリスト
     */
    public const ROLE_LIST = [
        self::ACCOUNT_ROLE_ADMIN => '管理者',
        self::ACCOUNT_ROLE_GENERAL => '一般'
    ];
}
