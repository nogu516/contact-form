<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
</head>

<body>
    <header>
        <h1>FashionablyLate</h1>
        <a href="{{ route('register.show') }}">register</a>
    </header>

    <div class="login-container">
        <h2>Login</h2>
        <form method="POST" action="{{ route('login.submit') }}">
            @csrf

            @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
            @endif

            <label for="email">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com">
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">パスワード</label>
            <input type="password" name="password" placeholder="例：coachtechweb">
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror

            <button type="submit">ログイン</button>
        </form>
    </div>
</body>

</html>