<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        @if (session('flashMessage'))
        <div class="alert alert-success text-center">
            {{ session('flashMessage') }}
        </div>
        @endif
        {{$role = Auth::user()->role}}
        <div class="top">
            <div class="inner1000 flex">
                <div>
                    <a href={{route('property.index')}}>物件情報</a>
                    <a href={{route('account.index')}}>アカウント情報</a>
                </div>
                <div class="flex">
                    <div>
                        <small>アカウント名：{{Auth::user()->name}}</small>
                        <small>権限名：{{config("curriclum.role.${role}")}}</small>
                    </div>
                    <a href={{route('account.logout')}}>ログアウト</a>
                </div>
            </div>
        </div>
        @yield('content')
    </main>
</body>

</html>