@extends('layouts.header')
@section('title', '物件編集')
@section('content')
<div class="inner1000 content">
    <h1>物件編集画面</h1>
    <form method="POST" action={{route('property.update')}}>
        @csrf
        <div class="flex entry">
            <div>
                <label>物件名</label>
                <input type="text" name="name" value={{ $property->name }}>
                {{ $errors->first('name')}}
            </div>
            <div>
                <label>広さ</label>
                <div class="prop-unit">
                    <input type="text" name="breadth" value={{ $property->breadth }}>
                    {{ $errors->first('breadth')}}
                </div>
            </div>
            <div>
                <label>住所</label>
                <input type="text" name="adress" value={{ $property->adress }}>
                {{ $errors->first('adress')}}
            </div>
            <div>
                <label>間取り</label>
                <div class="arrow-down">
                    <select name="floor_plan">
                        @foreach(config("curriclum.floor_plan") as $floor_plan)
                        @if($floor_plan === $property->floor_plan)
                        <option value={{$floor_plan}} selected>{{$floor_plan}}</option>
                        @else
                        <option value={{$floor_plan}}>{{$floor_plan}}</option>
                        @endif
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
                        @if($key === $property->tenancy_status)
                        <option value={{$key}} selected>{{$value}}</option>
                        @else
                        <option value={{$key}}>{{$value}}</option>
                        @endif
                        @endforeach
                    </select>
                    {{ $errors->first('tenancy_status')}}
                </div>
            </div>
        </div>
        <div class="flex btns">
            <a href={{route('property.index')}} class="btn">戻る</a>
            <div>
                <input type="hidden" name="id" value={{ $property->id }}>
                <button class="btn" name="update">保存する</button>
                <button class="btn" name="delete">削除する</button>
            </div>
        </div>
    </form>
</div>
@endsection