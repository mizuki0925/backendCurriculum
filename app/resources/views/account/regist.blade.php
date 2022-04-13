@extends('layouts.header')
@section('title', 'アカウント作成')
@section('content')
<div class="inner1000 content">
    <h1>アカウント登録画面</h1>
    <form>
        <div class="flex entry">
            <div>
                <label>アカウント名</label>
                <input type="text" placeholder="例）テスト名">
            </div>
            <div>
                <label>メールアドレス</label>
                <div>
                    <input type="text" placeholder="例）test@gmail.com">
                </div>
            </div>
            <div>
                <label>パスワード</label>
                <input type="text" placeholder="例）himitsu007">
            </div>
            <div>
                <label>電話番号</label>
                <input type="text" placeholder="例）07012345678">
            </div>
            <div>
                <label>権限</label>
                <div class="arrow-down">
                    <select>
                        <option>選択してください</option>
                        <option>一般</option>
                        <option>管理者</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('account.index')}} class="btn">戻る</a>
            <button class="btn">登録する</button>
        </div>
    </form>
</div>
@endsection