<?php

namespace App\Services;

use App\Repositories\RealestateRepositry;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Traits\UserRoleTrait;
use App\Traits\TenancyStatusTrait;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PropertyService
{
    use UserRoleTrait;
    use TenancyStatusTrait;

    private $realestateRepositry;

    public function __construct(RealestateRepositry $realestateRepositry)
    {
        $this->realestateRepositry = $realestateRepositry;
    }

    /**
     * 物件一覧取得処理
     *
     * @param Request $request 検索値
     * @return array
     */
    public function indexExec(Request $request): array
    {
        // TODO：②テンプレ共通化した場合、ログイン時にセッションで持っておくこともできる
        $user = Auth::user(); // ログインユーザーを取得
        $role = static::getLoginUserRole(); // ログインユーザーの権限名を取得

        // TODO：②Blade側でOLDメソッド使用時は不要
        $name = $request->input('name');
        $address = $request->input('address');

        // 物件情報を取得
        $realestates = $this->getRealestate($name, $address);
        // 入居状況のフォーマットを取得
        $realestates = $this->formatTenancyStatus($realestates);

        return [
            'user' => $user,
            'role' => $role,
            'realestates' => $realestates,
            'name' => $name,
            'address' => $address,
        ];
    }

    // TODO：②privateの説明
    /**
     * 物件検索処理
     *
     * @param string|null $name
     * @param string|null $address
     * @return LengthAwarePaginator
     */
    private function getRealestate(?string $name, ?string $address): LengthAwarePaginator
    {
        $query = $this->realestateRepositry->query();
        $query = $this->realestateRepositry->whereLike($query, 'name', $name);
        $query = $this->realestateRepositry->whereLike($query, 'address', $address);
        $realestates = $query->with('account')->paginate(10);

        // 上記も下記も同じ結果
        // $realestates = $this->realestateRepositry->searchRealestate($name, $address);

        return $realestates;
    }

    /**
     * 物件登録処理
     *
     * @param array $request 登録値
     * @return bool
     */
    public function createExec(array $request): bool
    {
        $result = false;

        // TODO：②TryCatchとトランザクションを使用する
        try {
            DB::beginTransaction();
            $user = Auth::user();
            $data = [
                'name' => $request['name'],
                'address' => $request['address'],
                'breadth' => $request['breadth'],
                'floor_plan' => $request['floor_plan'],
                'tenancy_status' => $request['tenancy_status'],
                'account_id' => $user->id,
            ];

            $this->realestateRepositry->create($data);

            // TODO：②エラー投げる
            // throw new \Exception("エラー");

            DB::commit();

            $result = true;
        } catch (\Exception $e) {
            DB::rollback();
            Log::error($e);
        }

        return $result;
    }
}
