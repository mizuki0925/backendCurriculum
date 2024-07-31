<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>タイトル</title>
    <link href="{{ asset('css/reset.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
// TODO:①共通化の説明
<body>
    <script src="{{ asset('/js/common.js') }}"></script>
    <main>
        <div class="top">
            <div class="inner1000 flex">
                <div>
                    <a href="{{ route('property.index') }}">物件情報</a>
                    <a href="{{ route('account.index') }}">アカウント情報</a>
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
            <div class="flex">
                <h1>アカウント一覧画面</h1>
                <div>
                    <a href="{{ route('account.regist') }}"><button class="btn">登録する</button></a>
                    <a href="{{ route('account.downloadCsv') }}"><button class="btn">CSV出力</button></a>
                </div>
            </div>
            <table class="aView">
                <tbody>
                    <tr>
                        // TODO:①Noの説明
                        {{--  <td>
                            <p>No</p>
                        </td>  --}}
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
                    @foreach ($accounts as $account)
                    // TODO:①埋め込みの説明
                        {{--  @php $class = '' @endphp
                        @if ($loop->last) $class = 'last' @endif  --}}
                        <tr>
                            // TODO:①Noの説明 https://eclair.blog/laravel-blade-loop/
                            {{--  <td>
                                <p>{{ $loop->iteration }}</p>
                            </td>  --}}
                            <td @class([
                                'name',                      {{-- 常にclassに含まれる --}}
                                'last' => $loop->last,  {{-- $hasErrorが真のときclassに含まれる --}}
                            ])>
                                <a href="{{ route('account.spec', ['accountId'=>$account->id]) }}">
                                    <p>{{ $account->name }}</p>
                                </a>
                            </td>
                            <td>
                                <p>{{ $account->email }}</p>
                            </td>
                            <td>
                                <p>{{ $account->tel }}</p>
                            </td>
                            <td>
                                // TODO:③定数化の説明　北山メモ：定数リストに存在しなかった場合不明にしました
                                <p>{{ CommonConst::ROLE_LIST[$account->role] ?? "不明" }}</p>
                            </td>
                            <td>
                                @if(Auth::user()->id === $account->id || Auth::user()->role === 1)
                                <a href="{{ route('account.edit', ['accountId'=>$account->id]) }}"><button class="btn">編集</button></a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{--  以降、追加処理  --}}
            // TODO:①jQueryの説明
            <button class="btn test-btn">表示する</button>
            <button class="btn api-btn hide">API実行</button>
            <div class="api-result"></div>

            // TODO:①Ajaxの説明
            <select id="prefectures" name="prefectures" style="margin-top: 20px">
                <option value=""> - </option>
            </select>
            <select id="cities" name="cities" style="margin-top: 20px">
                <option value=""> - </option>
            </select>
            {{--  以降、追加処理ここまで  --}}
        </div>
    </main>
</body>

</html>
