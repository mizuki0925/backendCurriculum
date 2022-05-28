@extends('layouts.header')
@section('title', 'アカウント一覧')
@section('content')
<div class="inner1000 content">
    <div class="flex">
        <h1>アカウント一覧画面</h1>
        <div>
            <a href={{route('account.regist')}}><button class="btn">登録する</button></a>
            <form method="POST" action={{route('account.csv')}}>
                @csrf
                <button class="btn">CSV出力</button>
            </form>
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
            @foreach ($accounts as $account)
            <?php
            $userRole = $account->role;
            ?>
            <tr>
                <td>
                    <a href={{route('account.spec', ['id' => $account->id])}}>
                        <p>{{ $account->name }}</p>
                    </a>
                </td>
                <td>
                    <p>{{ $account->email }}</p>
                </td>
                <td>
                    <p>{{ $account->tel }}</p>
                </td>
                <td>
                    <p>{{ config("curriclum.role.${userRole}") }}</p>
                </td>

                <td>
                    @can('isAdmin')
                    <a href={{route("account.edit", ['id' => $account->id])}}><button class="btn">編集</button></a>
                    @endcan
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $accounts->links() }}
</div>
@endsection