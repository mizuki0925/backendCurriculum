@extends('layouts.header')
@section('title', 'アカウント一覧')
@section('content')
<div class="inner1000 content">
    <div class="flex">
        <h1>アカウント一覧画面</h1>
        <div>
            <a href={{route('account.regist')}}><button class="btn">登録する</button></a>
            <a href="#"><button class="btn">CSV出力</button></a>
        </div>
    </div>
    <table class="aView">
        <tbody>
            <tr>
                <td>
                    <p>アカウント名</p>
                </td>
                <td>
                    <p>メールアドレス</p>
                </td>
                <td>
                    <p>電話番号</p>
                </td>
                <td>
                    <p>権限</p>
                </td>
                <td></td>
            </tr>
            <tr>
                <td>
                    <a href={{route('account.spec')}}>
                        <p>アカウント名</p>
                    </a>
                </td>
                <td>
                    <p>test@gmail.com</p>
                </td>
                <td>
                    <p>09012345678</p>
                </td>
                <td>
                    <p>一般</p>
                </td>
                <td>
                    <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('account.spec')}}">
                        <p>アカウント名</p>
                    </a>
                </td>
                <td>
                    <p>test@gmail.com</p>
                </td>
                <td>
                    <p>09012345678</p>
                </td>
                <td>
                    <p>管理者</p>
                </td>
                <td>
                    <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('account.spec')}}>
                        <p>アカウント名</p>
                    </a>
                </td>
                <td>
                    <p>test@gmail.com</p>
                </td>
                <td>
                    <p>09012345678</p>
                </td>
                <td>
                    <p>管理者</p>
                </td>
                <td>
                    <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('account.spec')}}>
                        <p>アカウント名</p>
                    </a>
                </td>
                <td>
                    <p>test@gmail.com</p>
                </td>
                <td>
                    <p>09012345678</p>
                </td>
                <td>
                    <p>管理者</p>
                </td>
                <td>
                    <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('account.spec')}}>
                        <p>アカウント名</p>
                    </a>
                </td>
                <td>
                    <p>test@gmail.com</p>
                </td>
                <td>
                    <p>09012345678</p>
                </td>
                <td>
                    <p>管理者</p>
                </td>
                <td>
                    <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
            <tr>
                <td>
                    <a href={{route('account.spec')}}>
                        <p>アカウント名</p>
                    </a>
                </td>
                <td>
                    <p>test@gmail.com</p>
                </td>
                <td>
                    <p>09012345678</p>
                </td>
                <td>
                    <p>管理者</p>
                </td>
                <td>
                    <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                </td>
            </tr>
        </tbody>
    </table>
    {{ $accounts->links() }}
</div>
@endsection