@extends('layouts.header')
@section('title', '物件一覧')
@section('content')
<div class="inner1000 content">
    <form action="">
        <input class="form-search" type="text" placeholder="物件名">
        <input class="form-search" type="text" placeholder="住所">
        <div align="right">
            <button class="form-search btn">検索する</button>
        </div>
    </form>
    <div class="flex">
        <h1>物件一覧画面</h1>
        <div>
            <a href={{route('property.regist')}}><button class="btn">登録する</button></a>
            <a href="#"><button class="btn">CSV出力</button></a>
        </div>
    </div>
    <table class="pView">
        <tbody>
            <tr>
                <td>
                    <p>物件名</p>
                </td>
                <td>
                    <p>住所</p>
                </td>
                <td>
                    <p>広さ</p>
                </td>
                <td>
                    <p>間取り</p>
                </td>
                <td>
                    <p>入居状況</p>
                </td>
                <td>
                    <p>物件最終更新者</p>
                </td>
                <td></td>
            </tr>
            @foreach ($propertys as $property)
            <?php
            $status = $property->tenancy_status;
            ?>
            <tr>
                <td>
                    <a href={{ route('property.spec') }}>
                        <p>{{ $property->name }}</p>
                    </a>
                </td>
                <td>
                    <p>{{ $property->adress }}</p>
                </td>
                <td>
                    <p>{{ $property->breadth }}㎡</p>
                </td>
                <td>
                    <p>{{ $property->floor_plan }}</p>
                </td>
                <td>
                    <p>{{ config("curriclum.tenancyStatus.${status}") }}</p>
                </td>
                <td>
                    <p>{{ $property->accounts->name }}</p>
                </td>
                <td>
                    <a href={{route('property.edit', ['id' => $property->id])}}><button class="btn">編集</button></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection