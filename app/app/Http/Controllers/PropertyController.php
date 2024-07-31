<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Account;
use App\Models\Realestate;
use Illuminate\Support\Facades\Response;
use App\Http\Requests\RealestateCreateRequest;
use App\Http\Requests\RealestateUpdateRequest;
use App\Services\PropertyService;
use App\Traits\UserRoleTrait;
use App\Traits\TenancyStatusTrait;
use Illuminate\View\View;

class PropertyController extends Controller
{
    //トレイトを使用する
    use UserRoleTrait;
    use TenancyStatusTrait;

    private $propertyService;

    public function __construct(PropertyService $propertyService)
    {
        $this->propertyService = $propertyService;
    }

    // TODO:②サービス層
    //
    /**
     * 物件一覧画面
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $response = [];

        // パターン①
        // propertyServiceをインスタンス化
        // $propertyService = new PropertyService;
        // $propertyService->indexExec($request);

        // パターン②
        $response = $this->propertyService->indexExec($request);

        return view('property/index', $response);


        // 現行の処理
        // // ログインユーザーを取得
        // $user = Auth::user();
        // // ログインユーザーの権限名を取得
        // $role = $this->getUserRole();

        // // 物件情報の検索クエリを作成
        // $query = Realestate::query();

        // // 物件名のキーワード検索
        // $name = $request->input('name');
        // if ($name) {
        //     $query->where('name', 'LIKE', "%{$name}%");
        // }

        // // 住所のキーワード検索
        // $address = $request->input('address');
        // if ($address) {
        //     $query->Where('address', 'LIKE', "%{$address}%");
        // }

        // // 全物件情報とアカウント情報を取得し、ページネーションを適用
        // $realestates = $query->with('account')->paginate(10);
        // // 入居状況のフォーマットを取得
        // $realestates = $this->formatTenancyStatus($realestates);

        // return view('property/index', [
        //     'user' => $user,
        //     'role' => $role,
        //     'realestates' => $realestates,
        //     'name' => $name,
        //     'address' => $address,
        // ]);
    }

    // 物件新規登録画面表示
    public function regist()
    {
        // ログインユーザーを取得
        $user = Auth::user();
        // ログインユーザーの権限名を取得
        $role = $this->getUserRole();

        return view('property/regist', [
            'user' => $user,
            'role' => $role,
        ]);
    }

    // TODO:②登録処理の場合
    // 物件新規登録処理
    public function create(RealestateCreateRequest $request)
    {
        $data = $request->validated();
        $result = $this->propertyService->createExec($data);

        // TODO:②現行処理では、メッセージの表示はなし？フラッシュメッセージで表示するのがよし。
        if ($result) {
            // 登録成功時
            return redirect()->route('property.index')->with([
                'success' => 'アカウントを登録しました',
            ]);
        } else {
            /// 登録失敗時
            return back()->with('error', 'アカウント登録が失敗しました');
        }

        // 現行の処理
        // ログインユーザーを取得
        // $user = Auth::user();
        // // データを取得
        // $data = $request->validated();

        // // 登録内容をデータベースに作成
        // $realestate = Realestate::create([
        //     'name' => $data['name'],
        //     'address' => $data['address'],
        //     'breadth' => $data['breadth'],
        //     'floor_plan' => $data['floor_plan'],
        //     'tenancy_status' => $data['tenancy_status'],
        //     'account_id' => $user->id,
        // ]);

        // // 登録が成功したらリダイレクトする
        // return redirect()->route('property.index')->with([
        //     'success' => 'アカウントを登録しました',
        // ]);
    }

    // 物件編集画面表示
    public function edit($realestateId)
    {
        $realestate = Realestate::with('account')->find($realestateId);

        // ログインユーザーを取得
        $user = Auth::user();
        // ログインユーザーの権限名を取得
        $role = $this->getUserRole();

        return view('property/edit', compact('realestate', 'user', 'role'));
    }

    // 物件更新
    // TODO:②関数名の書き方、統一すること
    public function Update(realestateUpdateRequest $request, $realestateId)
    {
        $data = $request->validated();
        $realestate = Realestate::find($realestateId);

        $realestate->update([
            'name' => $data['name'] ?? $realestate->name,
            'address' => $data['address'] ?? $realestate->address,
            'breadth' => $data['breadth'] ?? $realestate->breadth,
            'floor_plan' => $data['floor_plan'] ?? $realestate->floor_plan,
            'tenancy_status' => $data['tenancy_status'] ?? $realestate->tenancy_status,
        ]);

        $realestate->save();
        return redirect()->route('property.index')->with([
            'success' => '物件が更新されました',
        ]);
    }

    // 物件詳細
    public function spec($realestateId)
    {
        // ログインユーザーを取得
        $user = Auth::user();
        // ログインユーザーの権限名を取得
        $role = $this->getUserRole();

        // 物件情報を取得
        $realestate = Realestate::find($realestateId);
        // 入居状況のフォーマットを取得
        $this->formatTenancyStatus([$realestate]);

        return view('property/spec', compact('realestate', 'user', 'role'));
    }

    // 物件情報削除
    public function delete($realestateId)
    {
        $realestate = Realestate::find($realestateId);
        $realestate->delete();

        return redirect()->route('property.index')->with([
            'success' => '物件を削除しました',
        ]);
    }

    // CSV出力
    public function downloadCsv()
    {
        $realestate = Realestate::all();
        $csvHeader = ['id', '物件名', '住所', '広さ', '間取り', '入居状況', '物件登録者', 'created_at', 'updated_at'];
        $csvData = $realestate->toArray();

        $callback = function () use ($csvHeader, $csvData) {
            $file = fopen('php://output', 'w');
            fputcsv($file, $csvHeader);

            foreach ($csvData as $row) {
                fputcsv($file, $row);
            }

            fclose($file);
        };

        return Response::streamDownload($callback, 'realestate.csv', [
            'Content-Type' => 'text/csv',
        ]);
    }
}
