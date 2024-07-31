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
                        <small>アカウント名：{{ $user->name }}</small>
                        <small>権限名：{{ $role }}</small>
                    </div>
                    <a href="{{ route('account.login') }}">ログアウト</a>
                </div>
            </div>
        </div>
        <div class="inner1000 content">
            <h1>アカウント編集画面</h1>
            <form action="{{ route('account.update', ['accountId'=>$account->id]) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="flex entry">
                    <div>
                        <label>アカウント名</label>
                        <input type="text" name="name" id="name" value="{{ $account->name }}">
                        @error('name')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label>メールアドレス</label>
                        <input type="text" name="email" id="email" value="{{ $account->email }}">
                        @error('email')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label>パスワード</label>
                        <input type="text" name="password" id="password" value="">
                        @error('password')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label>電話番号</label>
                        <input type="text" name="tel" id="tel" value="{{ $account->tel }}">
                        @error('tel')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        @if(Auth::user()->role === 1)
                        <label>権限</label>
                        <div class="arrow-down">
                            <select name="role" id="role" value="{{ $account->role }}">
                                <option>選択してください</option>
                                <option value="2" {{ $account->role == 2 ? 'selected' : '' }}>一般</option>
                                <option value="1" {{ $account->role == 1 ? 'selected' : '' }}>管理者</option>
                            </select>
                        @error('role')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                        @endif
                        </div>
                    </div>
                </div>
                <div class="flex btns">
                    <a href="{{ route('account.index') }}" class="btn">戻る</a>
                    <div>
                        <button class="btn" type="submit">保存する</button>
                        @if(Auth::user()->role === 1)
                        <button class="btn" type="submit" formaction="{{ route('account.delete', ['accountId' => $account->id]) }}">削除する</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>