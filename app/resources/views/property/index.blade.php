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
                    <p>物件登録者</p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a href={{route('property.spec')}}>
                        <p>テスト名</p>
                    </a>
                </td>
                <td>
                    <p>テスト住所</p>
                </td>
                <td>
                    <p>10㎡</p>
                </td>
                <td>
                    <p>3LDK</p>
                </td>
                <td>
                    <p>満室</p>
                </td>
                <td>
                    <p>テストユーザー</p>
                </td>
                <td>
                    <a href={{route('property.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('property.spec')}}>
                        <p>テスト名</p>
                    </a>
                </td>
                <td>
                    <p>テスト住所</p>
                </td>
                <td>
                    <p>10㎡</p>
                </td>
                <td>
                    <p>3LDK</p>
                </td>
                <td>
                    <p>満室</p>
                </td>
                <td>
                    <p>テストユーザー</p>
                </td>
                <td>
                    <a href={{route('property.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('property.spec')}}>
                        <p>テスト名</p>
                    </a>
                </td>
                <td>
                    <p>テスト住所</p>
                </td>
                <td>
                    <p>10㎡</p>
                </td>
                <td>
                    <p>3LDK</p>
                </td>
                <td>
                    <p>満室</p>
                </td>
                <td>
                    <p>テストユーザー</p>
                </td>
                <td>
                    <a href={{route('property.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('property.spec')}}>
                        <p>テスト名</p>
                    </a>
                </td>
                <td>
                    <p>テスト住所</p>
                </td>
                <td>
                    <p>10㎡</p>
                </td>
                <td>
                    <p>3LDK</p>
                </td>
                <td>
                    <p>満室</p>
                </td>
                <td>
                    <p>テストユーザー</p>
                </td>
                <td>
                    <a href={{route('property.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('property.spec')}}>
                        <p>テスト名</p>
                    </a>
                </td>
                <td>
                    <p>テスト住所</p>
                </td>
                <td>
                    <p>10㎡</p>
                </td>
                <td>
                    <p>3LDK</p>
                </td>
                <td>
                    <p>満室</p>
                </td>
                <td>
                    <p>テストユーザー</p>
                </td>
                <td>
                    <a href={{route('property.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('property.spec')}}>
                        <p>テスト名</p>
                    </a>
                </td>
                <td>
                    <p>テスト住所</p>
                </td>
                <td>
                    <p>10㎡</p>
                </td>
                <td>
                    <p>3LDK</p>
                </td>
                <td>
                    <p>満室</p>
                </td>
                <td>
                    <p>テストユーザー</p>
                </td>
                <td>
                    <a href={{route('property.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
@endsection