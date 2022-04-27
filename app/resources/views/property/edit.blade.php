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
            <h1>物件編集画面</h1>
            <form>
                <div class="flex entry">
                    <div>
                        <label>物件名</label>
                        <input type="text" placeholder="例）テスト名">
                    </div>
                    <div>
                        <label>広さ</label>
                        <div class="prop-unit">
                            <input type="text" placeholder="例）10">
                        </div>
                    </div>
                    <div>
                        <label>住所</label>
                        <input type="text" placeholder="例）テスト住所">
                    </div>
                    <div>
                        <label>間取り</label>
                        <input type="text" placeholder="例）3LDK">
                    </div>
                    <div>
                        <label>入居状況</label>
                        <div class="arrow-down">
                            <select>
                                <option>選択してください</option>
                                <option>空室</option>
                                <option>満室</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex btns">
                    <a href={{route('property.index')}} class="btn">戻る</a>
                    <div>
                        <button class="btn">保存する</button>
                        <button class="btn">削除する</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>