<?php

namespace App\Repositories;

use App\Models\Realestate;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\LengthAwarePaginator as paginator; // useする際にクラス名が分かり辛かったらasで名前つけちゃうのもあり

class RealestateRepositry
{
    private $realestateModel;

    public function __construct(Realestate $realestateModel)
    {
        $this->realestateModel = $realestateModel;
    }

    /**
     * 物件検索時の取得処理
     *
     * @param string|null $name 物件名
     * @param string|null $address 物件住所
     * @return paginator
     */
    public function searchRealestate(?string $name, ?string $address): paginator
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

    /**
     * クエリ発行
     *
     * @return Builder
     */
    public function query(): Builder
    {
        return $this->realestateModel->newQuery();
    }

    /**
     * where条件（部分一致）
     *
     * @param Builder $query
     * @param string $column
     * @param string|null $data
     * @return Builder
     */
    public function whereLike(Builder $query, string $column, string|null $data): Builder
    {
        if ($data) {
            $query->where($column, 'LIKE', "%{$data}%");
        }

        return $query;
    }

    /**
     * 登録処理
     *
     * @param array $data
     * @return void
     */
    public function create(array $data): void
    {
        $this->realestateModel->create($data);
    }
}
