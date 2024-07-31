<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //モデルを継承
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Account;
use App\Traits\UserRoleTrait;

class Realestate extends Model
{
    use HasApiTokens, HasFactory, Notifiable, UserRoleTrait;

    //関連付けるテーブル
    protected $table = 'realestate';

    //テーブルに関連付ける主キー
    protected $primaryKey = 'id';

    //登録・更新可能なカラムの指定
    protected $fillable = [
        'name',
        'address',
        'breadth',
        'floor_plan',
        'tenancy_status',
        'account_id'
    ];

    //リレーションシップの設定
    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // TODO:②リポジトリ層がなければ、ModelにDB処理は記載する
    /**
     * 物件検索時の取得処理
     *
     * @param string|null $name 物件名
     * @param string|null $address 物件住所
     * @return void
     */
    public function serchRealestate(string|null $name, string|null $address)
    {
        $query = Realestate::query(); // 物件情報の検索クエリを作成

        // 物件名のキーワード検索
        if ($name) {
            $query->where('name', 'LIKE', "%{$name}%");
        }

        // 住所のキーワード検索
        if ($address) {
            $query->Where('address', 'LIKE', "%{$address}%");
        }

        // 全物件情報とアカウント情報を取得し、ページネーションを適用
        $realestates = $query->with('account')->paginate(10);

        return $realestates;
    }
}
