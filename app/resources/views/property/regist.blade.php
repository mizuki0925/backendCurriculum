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
            <h1>物件登録画面</h1>
            <form action="{{ route('property.regist') }}" method="POST">
            @csrf
            <form>
                <div class="flex entry">
                    <div>
                        <label for="name">物件名</label>
                        <input type="text" name="name" id="name" placeholder="例）テスト名">
                        @error('name')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label for="breadth">広さ</label>
                        <div class="prop-unit">
                            <input type="text" name="breadth" id="breadth" placeholder="例）10">
                        @error('breadth')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                        </div>
                    </div>
                    <div>
                        <label for="address">住所</label>
                        <input type="text" name="address" id="address" placeholder="例）テスト住所">
                        @error('address')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label for="floor_plan">間取り</label>
                        <input type="text" name="floor_plan" id="floor_plan" placeholder="例）3LDK">
                        @error('floor_plan')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label for="tenancy_status">入居状況</label>
                        <div class="arrow-down">
                            <select name="tenancy_status" id="tenancy_status">
                                <option>選択してください</option>
                                <option value="1">満室</option>
                                <option value="2">空室</option>
                                <option value="3">空き予定</option>
                            </select>
                            @error('tenancy_status')
                            <div class="error"><span>{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex btns">
                    <a href="{{ route('property.index') }}" class="btn">戻る</a>
                    <button class="btn">登録する</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>