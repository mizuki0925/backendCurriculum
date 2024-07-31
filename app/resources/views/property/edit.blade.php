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
                    <a href="{{ route('property.index' )}}">物件情報</a>
                    <a href="{{ route('account.index' )}}">アカウント情報</a>
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
            <h1>物件編集画面</h1>
            <form action="{{ route('property.update', ['realestateId'=>$realestate->id]) }}" method="POST">
            @csrf
            @method('PUT')
                <div class="flex entry">
                    <div>
                        <label>物件名</label>
                        <input type="text" name="name" id="name" value="{{ $realestate->name }}">
                        @error('name')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label>広さ</label>
                        <div class="prop-unit">
                        <input type="text" name="breadth" id="breadth" value="{{ $realestate->breadth }}">
                        @error('breadth')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                        </div>
                    </div>
                    <div>
                        <label>住所</label>
                        <input type="text" name="address" id="address" value="{{ $realestate->address }}">
                        @error('address')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label>間取り</label>
                        <input type="text" name="floor_plan" id="floor_plan" value="{{ $realestate->floor_plan }}">
                        @error('floor_plan')
                        <div class="error"><span>{{ $message }}</span></div>
                        @enderror
                    </div>
                    <div>
                        <label>入居状況</label>
                        <div class="arrow-down">
                            <select name="tenancy_status" id="tenancy_status">
                                <option value="">選択してください</option>
                                <option value="1" {{ $realestate->tenancy_status == 1 ? 'selected' : '' }}>満室</option>
                                <option value="2" {{ $realestate->tenancy_status == 2 ? 'selected' : '' }}>空室</option>
                                <option value="3" {{ $realestate->tenancy_status == 3 ? 'selected' : '' }}>空き予定</option>
                            </select>
                            @error('tenancy_status')
                            <div class="error"><span>{{ $message }}</span></div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="flex btns">
                    <a href="{{ route('property.index' )}}" class="btn">戻る</a>
                    <div>
                        <button class="btn" type="submit">保存する</button>
                        <button class="btn" type="submit" formaction="{{ route('property.delete',['realestateId' => $realestate->id]) }}">削除する</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</body>

</html>