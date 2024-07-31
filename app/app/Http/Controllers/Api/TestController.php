<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/**
 * APIコントローラクラス
 */
class TestController extends Controller
{
    /**
     * XXXデータ取得処理
     *
     * @param Request $request
     * @param string data
     * @return JsonResponse
     */
    // public function getData(Request $request, $data): JsonResponse
    public function getData($data): JsonResponse
    {
        // TODO:API時のデバッグ方法
        \Log::debug($data);

        $response = [];
        $data = $data . '-OK';

        // ここで処理のロジックを記載する
        // 登録、削除、取得処理など
        $response = [
            'status' => 'success',
            'message' => 'データの取得に成功しました。',
            'data' => $data,
        ];

        return response()->json($response, 200);
    }

    /**
     * 都道府県一覧取得API
     *
     * @return JsonResponse
     */
    public function getPrefectures(): JsonResponse
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            "X-API-KEY" => config('api', 'api_key'),
        ])->get('https://opendata.resas-portal.go.jp/api/v1/prefectures');

        return response()->json($response['result'], 200);
    }

    /**
     * 市区町村一覧取得API
     *
     * @param string $preCode
     * @return JsonResponse
     */
    public function getCities(string $preCode): JsonResponse
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            "X-API-KEY" => config('api', 'api_key'),
        ])->get('https://opendata.resas-portal.go.jp/api/v1/cities?prefCode=' . $preCode);

        return response()->json($response['result'], 200);
    }
}
