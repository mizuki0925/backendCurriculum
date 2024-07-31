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
        <div class="inner400 login">
            <div class="login_form">
                <h1>管理者ログイン画面</h1>
                <form>
                    <div>
                        <input placeholder="メールアドレス"><br>
                        <input placeholder="パスワード">
                    </div>
                    <button class="btn" type="submit">ログイン</button>
                </form>
            </div>
        </div>
    </main>
</body>
</html>