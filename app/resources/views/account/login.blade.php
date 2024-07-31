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
                <h1>ログイン</h1>
                <form action="{{ route('account.loginSubmit') }}" method="POST">
                @csrf
                    <div>
                        <input type="email" name="email" id="email"  placeholder="メールアドレス"><br>
                        <input type="password" name="password" id="password" placeholder="パスワード">
                    </div>
                    <div class="flex btns">
                        <button class="btn" type="submit">ログイン</button>
                        <a href="{{ route('account.regist') }}" class="btn">新規登録</a>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>
</html>