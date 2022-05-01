<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        @if (session('flashMessage'))
        <div class="alert alert-success text-center">
            {{ session('flashMessage') }}
        </div>
        @endif
        <div class="inner400 login">
            <div class="login_form">
                <h1>ログイン</h1>
                <form method="POST" action={{route('account.logon')}}>
                    @csrf
                    <div>
                        <input name="email" type="email" value="{{ old('email') }}" placeholder="メールアドレス"><br>
                        {{ $errors->first('email')}}
                        <input name="password" type="password" placeholder="パスワード">
                        {{ $errors->first('password')}}
                    </div>
                    <button class="btn" type="submit" name="logon">ログイン</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>