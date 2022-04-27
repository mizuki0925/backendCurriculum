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
            <div class="flex">
                <h1>アカウント一覧画面</h1>
                <div>
                    <a href={{route('account.regist')}}><button class="btn">登録する</button></a>
                    <a href="#"><button class="btn">CSV出力</button></a>
                </div>
            </div>
            <table class="aView">
                <tbody>
                    <tr>
                        <td>
                            <p>アカウント名</p>
                        </td>
                        <td>
                            <p>メールアドレス</p>
                        </td>
                        <td>
                            <p>電話番号</p>
                        </td>
                        <td>
                            <p>権限</p>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>
                            <a href={{route('account.spec')}}>
                                <p>アカウント名</p>
                            </a>
                        </td>
                        <td>
                            <p>test@gmail.com</p>
                        </td>
                        <td>
                            <p>09012345678</p>
                        </td>
                        <td>
                            <p>一般</p>
                        </td>
                        <td>
                            <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href={{route('account.spec')}}">
                                <p>アカウント名</p>
                            </a>
                        </td>
                        <td>
                            <p>test@gmail.com</p>
                        </td>
                        <td>
                            <p>09012345678</p>
                        </td>
                        <td>
                            <p>管理者</p>
                        </td>
                        <td>
                            <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href={{route('account.spec')}}>
                                <p>アカウント名</p>
                            </a>
                        </td>
                        <td>
                            <p>test@gmail.com</p>
                        </td>
                        <td>
                            <p>09012345678</p>
                        </td>
                        <td>
                            <p>管理者</p>
                        </td>
                        <td>
                            <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href={{route('account.spec')}}>
                                <p>アカウント名</p>
                            </a>
                        </td>
                        <td>
                            <p>test@gmail.com</p>
                        </td>
                        <td>
                            <p>09012345678</p>
                        </td>
                        <td>
                            <p>管理者</p>
                        </td>
                        <td>
                            <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href={{route('account.spec')}}>
                                <p>アカウント名</p>
                            </a>
                        </td>
                        <td>
                            <p>test@gmail.com</p>
                        </td>
                        <td>
                            <p>09012345678</p>
                        </td>
                        <td>
                            <p>管理者</p>
                        </td>
                        <td>
                            <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <a href={{route('account.spec')}}>
                                <p>アカウント名</p>
                            </a>
                        </td>
                        <td>
                            <p>test@gmail.com</p>
                        </td>
                        <td>
                            <p>09012345678</p>
                        </td>
                        <td>
                            <p>管理者</p>
                        </td>
                        <td>
                            <a href={{route('account.edit')}}><button class="btn">編集</button></a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</body>

</html>