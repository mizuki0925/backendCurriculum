@extends('layouts.header')
@section('title', '物件詳細')
@section('content')
<div class="inner1000 content">
    <h1>物件詳細画面</h1>
    <form>
        <div class="flex entry spec">
            <div>
                <label>物件名</label>
                <p>テスト物件名</p>
            </div>
            <div>
                <label>広さ</label>
                <p class="prop-unit">30</p>
            </div>
            <div>
                <label>住所</label>
                <p>東京都渋谷区〇〇1−1−1</p>
            </div>
            <div>
                <label>間取り</label>
                <p>3LDK</p>
            </div>
            <div>
                <label>入居状況</label>
                <p>満室</p>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('property.index')}} class="btn">戻る</a>
        </div>
    </form>
</div>
@endsection