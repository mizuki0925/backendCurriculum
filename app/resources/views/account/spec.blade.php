@extends('layouts.header')
@section('title', 'アカウント詳細')
@section('content')
<?php
$userRole = $account->role;
?>
<div class="inner1000 content">
    <h1>アカウント詳細画面</h1>
    <form>
        <div class="flex entry spec">
            <div>
                <label>アカウント名</label>
                <p>{{ $account->name }}</p>
            </div>
            <div>
                <label>メールアドレス</label>
                <p>{{ $account->email }}</p>
            </div>
            <div>
                <label>パスワード</label>
                <p>●●●●●●●</p>
            </div>
            <div>
                <label>電話番号</label>
                <p>{{ $account->tel }}</p>
            </div>
            <div>
                <label>権限</label>
                <p>{{ config("curriclum.role.${userRole}") }}</p>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('account.index')}} class="btn">戻る</a>
        </div>
    </form>
</div>
@endsection