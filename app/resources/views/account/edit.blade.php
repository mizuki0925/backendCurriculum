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
            <h1>アカウント編集画面</h1>
            <form>
                <div class="flex entry">
                    <div>
                        <label>アカウント名</label>
                        <input type="text" placeholder="例）テスト名">
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <div>
                            <input type="text" placeholder="例）test@gmail.com">
                        </div>
                    </div>
                    <div>
                        <label>パスワード</label>
                        <input type="text" placeholder="例）himitsu007">
                    </div>
                    <div>
                        <label>電話番号</label>
                        <input type="text" placeholder="例）07012345678">
                    </div>
                    <div>
                        <label>権限</label>
                        <div class="arrow-down">
                            <select>
                                <option>選択してください</option>
                                <option>一般</option>
                                <option>管理者</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex btns">
                    <a href={{route('account.index')}} class="btn">戻る</a>
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