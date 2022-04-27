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
            <h1>アカウント詳細画面</h1>
            <form>
                <div class="flex entry spec">
                    <div>
                        <label>アカウント名</label>
                        <p>テストユーザー</p>
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <p>test@gmail.com</p>
                    </div>
                    <div>
                        <label>パスワード</label>
                        <p>XXXXXXXX</p>
                    </div>
                    <div>
                        <label>電話番号</label>
                        <p>09012345678</p>
                    </div>
                    <div>
                        <label>権限</label>
                        <p>管理者</p>
                    </div>
                </div>
                <div class="flex btns">
                    <a href={{route('account.index')}} class="btn">戻る</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>