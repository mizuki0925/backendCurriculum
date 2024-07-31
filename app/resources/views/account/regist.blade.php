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
        <div class="inner1000 content">
            <h1>アカウント登録画面</h1>
            <form action="{{ route('account.regist') }}" method="POST">
            @csrf
                <div class="flex entry">
                    <div>
                        <label for="name">アカウント名</label>
                        <input type="text" name="name" id="name" placeholder="例）テスト名">
                    </div>
                    <div>
                        <label for="email">メールアドレス</label>
                        <div>
                            <input type="text" name="email" id="email" placeholder="例）test@gmail.com">
                        </div>
                    </div>
                    <div>
                        <label for="password">パスワード</label>
                        <input type="text" name="password" id="password" placeholder="例）himitsu007">
                    </div>
                    <div>
                        <label for="tel">電話番号</label>
                        <input type="text" name="tel" id="tel" placeholder="例）07012345678">
                    </div>
                    <div>
                        <label for="role">権限</label>
                        <div class="arrow-down">
                            <select name="role" id="role">
                                <option>選択してください</option>
                                <option value="2">一般</option>
                                <option value="1">管理者</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex btns">
                    <a href="{{ route('account.index') }}" class="btn">戻る</a>
                    <button class="btn" type="submit">登録</button>
                </div>
            </form>
        </div>
    </main>
</body>

</html>