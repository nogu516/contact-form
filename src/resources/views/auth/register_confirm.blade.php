<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>登録内容の確認</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <h1>登録内容の確認</h1>

    <form method="POST" action="{{ route('register.store') }}">
        @csrf

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <div>
            <label>姓: 名:</label>
            {{ $data['fullName'] }}
            <input type="hidden" name="fullName" value="{{ $data['fullName'] }}">
        </div>

        <div>
            <label>メールアドレス:</label>
            {{ $data['email'] }}
            <input type="hidden" name="email" value="{{ $data['email'] }}">
        </div>

        <div>
            <label>パスワード:</label>
            ※セキュリティのため表示しません
            <input type="hidden" name="password" value="{{ $data['password'] }}">
            <input type="hidden" name="password_confirmation" value="{{ $data['password_confirmation'] }}">
        </div>

        <p>名前：{{ $data['fullName'] }}</p>
        <p>メールアドレス：{{ $data['email'] }}</p>
        <button type="submit">この内容で登録</button>
    </form>

    <form method="GET" action="{{ route('register.show') }}">
        <button type="submit">戻る</button>
    </form>
</body>

</html>