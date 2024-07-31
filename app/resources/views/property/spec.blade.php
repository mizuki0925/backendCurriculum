<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タイトル</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <div class="top">
            <div class="inner1000 flex">
                <div>
                    <a href="{{ route('property.index') }}">物件情報</a>
                    <a href="{{ route('account.index') }}">アカウント情報</a>
                </div>
                <div class="flex">
                    <div>
                        <small>アカウント名：{{ $user->name }}</small>
                        <small>権限名：{{ $role }}</small>
                    </div>
                    <a href="{{ route('account.login') }}">ログアウト</a>
                </div>
            </div>
        </div>
        <div class="inner1000 content">
            <h1>物件詳細画面</h1>
            @csrf
            <form>
                <div class="flex entry spec">
                    <div>
                        <label>物件名</label>
                        <p>{{$realestate->name}}</p>
                    </div>
                    <div>
                        <label>広さ</label>
                        <p class="prop-unit">{{$realestate->breadth}}</p>
                    </div>
                    <div>
                        <label>住所</label>
                        <p>{{$realestate->address}}</p>
                    </div>
                    <div>
                        <label>間取り</label>
                        <p>{{$realestate->floor_plan}}</p>
                    </div>
                    <div>
                        <label>入居状況</label>
                        <p>{{$realestate->tenancy_status}}</p>
                    </div>
                </div>
                <div class="flex btns">
                    <a href="{{ route('property.index') }}" class="btn">戻る</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>