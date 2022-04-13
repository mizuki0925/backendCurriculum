@extends('layouts.header')
@section('title', '物件編集')
@section('content')
<div class="inner1000 content">
    <h1>物件編集画面</h1>
    <form>
        <div class="flex entry">
            <div>
                <label>物件名</label>
                <input type="text" placeholder="例）テスト名">
            </div>
            <div>
                <label>広さ</label>
                <div class="prop-unit">
                    <input type="text" placeholder="例）10">
                </div>
            </div>
            <div>
                <label>住所</label>
                <input type="text" placeholder="例）テスト住所">
            </div>
            <div>
                <label>間取り</label>
                <input type="text" placeholder="例）3LDK">
            </div>
            <div>
                <label>入居状況</label>
                <div class="arrow-down">
                    <select>
                        <option>選択してください</option>
                        <option>空室</option>
                        <option>満室</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('property.index')}} class="btn">戻る</a>
            <div>
                <button class="btn">保存する</button>
                <button class="btn">削除する</button>
            </div>
        </div>
    </form>
</div>
@endsection