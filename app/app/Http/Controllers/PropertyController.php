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
    public function index()
    {
        // $propertys = Realestate::join('accounts', 'realestates.user_id', '=', 'accounts.id')->paginate(10);
        $propertys = Realestate::with('accounts')->orderBy('id', 'desc')->paginate(10);
        return view('property/index', compact('propertys'));
    }

    public function regist()
    {
        return view('property/regist');
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

    public function spec()
    {
        return view('property/spec');
    }
}
