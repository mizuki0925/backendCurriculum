@extends('layouts.header')
@section('title', '物件登録')
@section('content')
<div class="inner1000 content">
    <h1>物件登録画面</h1>
    <form method="POST" action={{route('property.add')}}>
        @csrf
        <div class="flex entry">
            <div>
                <label>物件名</label>
                <input type="text" name="name" value="{{ old('name') }}" placeholder="例）テスト名">
                {{ $errors->first('name')}}
            </div>
            <div>
                <label>広さ</label>
                <div class="prop-unit">
                    <input type="number" name="breadth" value="{{ old('breadth') }}" placeholder="例）10">
                    {{ $errors->first('breadth')}}
                </div>
            </div>
            <div>
                <label>住所</label>
                <input type="text" name="adress" value="{{ old('adress') }}" placeholder="例）テスト住所">
                {{ $errors->first('adress')}}
            </div>
            <div>
                <label>間取り</label>
                <div class="arrow-down">
                    <select name="floor_plan">
                        @foreach(config("curriclum.floor_plan") as $floor_plan)
                        <option value={{$floor_plan}}>{{$floor_plan}}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('floor_plan')}}
                </div>
            </div>
            <div>
                <label>入居状況</label>
                <div class="arrow-down">
                    <select name="tenancy_status">
                        @foreach(config("curriclum.tenancyStatus") as $key => $value)
                        <option value={{$key}}>{{$value}}</option>
                        @endforeach
                    </select>
                    {{ $errors->first('tenancy_status')}}
                </div>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('property.index')}} class="btn">戻る</a>
            <button class="btn">登録する</button>
        </div>
    </form>
</div>
@endsection