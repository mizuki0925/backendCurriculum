@extends('layouts.header')
@section('title', 'アカウント詳細')
@section('content')
<div class="inner1000 content">
    <h1>アカウント詳細画面</h1>
    <form>
        <div class="flex entry spec">
            <div>
                <label>アカウント名</label>
                <p>テストユーザー</p>
            </div>
            <div>
                <label>メールアドレス</label>
                <p>test@gmail.com</p>
            </div>
            <div>
                <label>パスワード</label>
                <p>XXXXXXXX</p>
            </div>
            <div>
                <label>電話番号</label>
                <p>09012345678</p>
            </div>
            <div>
                <label>権限</label>
                <p>管理者</p>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('account.index')}} class="btn">戻る</a>
        </div>
    </form>
</div>
@endsection