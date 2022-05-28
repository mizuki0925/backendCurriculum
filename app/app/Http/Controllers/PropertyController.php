<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use App\Models\Realestate;
use PhpParser\Builder\Property;
use App\Http\Requests\RealestateRequest;
use Illuminate\Support\Facades\Auth;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        // セッションをリセット
        $request->session()->forget('name');
        $request->session()->forget('adress');
        // 検索条件を保存
        $searchList = [];
        $searchList["name"] = $request->name;
        $searchList["adress"] = $request->adress;
        // 検索条件が無い場合全検索
        if (empty($searchList["name"]) && empty($searchList["adress"])) {
            $propertys = Realestate::with('accounts')
                ->orderBy('id', 'desc')
                ->paginate(10);
        } else {
            // 検索条件がある場合部分一致検索
            $request->session()->put('name', $searchList["name"]);
            $request->session()->put('adress', $searchList["adress"]);
            $propertys = Realestate::with('accounts')
                ->names($request->name)
                ->adresss($request->adress)
                ->orderBy('id', 'desc')
                ->paginate(10);
        }
        return view('property/index', compact('propertys'));
    }

    public function regist()
    {
        return view('property/regist');
    }

    public function add(RealestateRequest $request)
    {
        try {
            $property = new Realestate();
            $property->create([
                'name' => $request->name,
                'breadth' => $request->breadth,
                'adress' => $request->adress,
                'floor_plan' => $request->floor_plan,
                'tenancy_status' => $request->tenancy_status,
                'account_id' => Auth::id()
            ]);
            return redirect('property')->with('flashMessage', '物件の登録が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', '物件の登録に失敗しました');
        }
    }

    public function edit($id)
    {
        $property = Realestate::find($id);
        return view('property/edit', compact('property'));
    }

    public function update(RealestateRequest $request)
    {
        if ($request->has('delete')) {
            return $this->delete($request);
        }
        try {
            $property = Realestate::find($request->id);
            $property->update([
                'name' => $request->name,
                'breadth' => $request->breadth,
                'adress' => $request->adress,
                'floor_plan' => $request->floor_plan,
                'tenancy_status' => $request->tenancy_status,
                'account_id' => Auth::id()
            ]);
            return redirect("property/edit/$property->id")->with('flashMessage', '物件の更新が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', '物件の更新に失敗しました');
        }
        return view('property/edit', compact('property'));
    }

    public function delete(Request $request)
    {
        // 削除処理
        try {
            $account = Realestate::find($request->id);
            $account->delete();
            return redirect("property")->with('flashMessage', '物件の削除が完了しました');
        } catch (\Throwable $th) {
            return back()->with('flashMessage', '物件の削除に失敗しました');
        }
    }

    public function spec($id)
    {
        $property = Realestate::find($id);
        return view('property/spec', compact('property'));
    }

    public function csvDownlord()
    {
        $headers = [
            'Content-type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename=propertys.csv',
            'Pragma' => 'no-cache',
            'Cache-Control' => 'must-revalidate, post-check=0, pre-check=0',
            'Expires' => '0',
        ];
        $callback = function () {
            $file = fopen('php://output', 'w');
            $propertys = Realestate::orderBy('id', 'desc')->get();
            $columns = [
                'ＩＤ',
                '物件名',
                '住所',
                '広さ',
                '間取り',
                '入居状況'
            ];
            mb_convert_variables('SJIS', 'UTF-8', $columns);
            // カラムを書き込み
            fputcsv($file, $columns);
            foreach ($propertys as $property) {
                $data = [
                    $property->id,
                    $property->name,
                    $property->adress,
                    $property->breadth,
                    $property->floor_plan,
                    config("curriclum.tenancyStatus.$property->tenancy_status")
                ];
                mb_convert_variables('SJIS-win', 'UTF-8', $data);
                // データを書き込み
                fputcsv($file, $data);
            }
            fclose($file);
        };
        return response()->stream($callback, 200, $headers);
    }
}
