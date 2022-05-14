@extends('layouts.header')
@section('title', 'アカウント登録')
@section('content')
<div class="inner1000 content">
    <h1>アカウント登録画面</h1>
    <form method="POST" action={{route('account.add')}}>
        @csrf
        <div class="flex entry">
            <div>
                <label>アカウント名</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="例）テスト名">
                {{ $errors->first('name')}}
            </div>
            <div>
                <label>メールアドレス</label>
                <div>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="例）test@gmail.com">
                    {{ $errors->first('email')}}
                </div>
            </div>
            <div>
                <label>パスワード</label>
                <input type="text" name="password" placeholder="例）himitsu007">
                {{ $errors->first('password')}}
            </div>
            <div>
                <label>電話番号</label>
                <input type="text" name="tel" value="{{ old('tel') }}" placeholder="例）07012345678">
                {{ $errors->first('tel')}}
            </div>
            <div>
                <label>権限</label>
                <div class="arrow-down">
                    <select name="role">
                        <option>選択してください</option>
                        @foreach(config("curriclum.role") as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('role')}}
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