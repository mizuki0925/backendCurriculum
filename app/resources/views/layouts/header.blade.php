<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="top">
            <div class="inner1000 flex">
                <div>
                    <a href={{route('property.index')}}>物件情報</a>
                    <a href={{route('account.index')}}>アカウント情報</a>
                </div>
                <div class="flex">
                    <div>
                        <small>アカウント名</small>
                        <small>権限名</small>
                    </div>
                    <a href="#">ログイン</a>
                    <a href="#">ログアウト</a>
                </div>
            </div>
        </div>
        @yield('content')
    </main>
</body>

</html>