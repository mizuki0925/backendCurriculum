<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; //追記
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Traits\UserRoleTrait;

class Account extends Authenticatable //モデルから変更
{
    use HasApiTokens, HasFactory, Notifiable;

    //関連付けるテーブル
    protected $table ='accounts';

    //テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    //登録・更新可能なカラムの指定
    protected $fillable = [
        'name',
        'email',
        'password',
        'tel',
        'role',
    ];

    protected $hidden = [
        'password',
    ];
}
