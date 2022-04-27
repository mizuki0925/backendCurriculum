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
        <div class="inner1000 content">
            <h1>物件詳細画面</h1>
            <form>
                <div class="flex entry spec">
                    <div>
                        <label>物件名</label>
                        <p>テスト物件名</p>
                    </div>
                    <div>
                        <label>広さ</label>
                        <p class="prop-unit">30</p>
                    </div>
                    <div>
                        <label>住所</label>
                        <p>東京都渋谷区〇〇1−1−1</p>
                    </div>
                    <div>
                        <label>間取り</label>
                        <p>3LDK</p>
                    </div>
                    <div>
                        <label>入居状況</label>
                        <p>満室</p>
                    </div>
                </div>
                <div class="flex btns">
                    <a href={{route('property.index')}} class="btn">戻る</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>