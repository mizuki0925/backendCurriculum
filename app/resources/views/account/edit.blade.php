@extends('layouts.header')
@section('title', 'アカウント編集')
@section('content')
<div class="inner1000 content">
    <h1>アカウント編集画面</h1>
    <form method="POST" action={{route('account.update')}}>
        @csrf
        <div class="flex entry">
            <div>
                <label>アカウント名</label>
                <input type="text" name="name" value={{ $account->name }}>
                {{ $errors->first('name')}}
            </div>
            <div>
                <label>メールアドレス</label>
                <div>
                    <input type="email" name="email" value={{ $account->email }}>
                    {{ $errors->first('email')}}
                </div>
            </div>
            <div>
                <label>パスワード</label>
                <input type="text" name="password" value="">
                {{ $errors->first('password')}}
            </div>
            <div>
                <label>電話番号</label>
                <input type="text" name="tel" value={{ $account->tel }}>
                {{ $errors->first('tel')}}
            </div>
            <div>
                @can('isAdmin')
                <label>権限</label>
                <div class="arrow-down">
                    <select name="role">
                        @foreach(config("curriclum.role") as $key => $value)
                        @if($key === $account->role)
                        <option value={{$key}} selected>{{$value}}</option>
                        @else
                        <option value={{$key}}>{{$value}}</option>
                        @endif
                        @endforeach
                    </select>
                    {{ $errors->first('role')}}
                </div>
                @else
                <label>権限</label>
                <div>{{ config("curriclum.role.$account->role") }}</div>
                @endcan
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('account.index')}} class="btn" name="back">戻る</a>
            <div>
                <input type="hidden" name="id" value={{ $account->id }}>
                <button class="btn" name="update">保存する</button>
                <button class="btn" name="delete">削除する</button>
            </div>
        </div>
    </form>
</div>
@endsection