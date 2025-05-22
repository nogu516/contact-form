<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>

<body>
    <header class="header">
        <h1>FashionablyLate</h1>
        <a href="/login">login</a>
    </header>

    <div class="register-container">
        <h2>Register</h2>

        <form method="POST" action="{{ route('register.confirm') }}">
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

            <label for="fullName">お名前</label>
            <input type="text" name="fullName" value="{{ old('fullName') }}" placeholder="例：山田　太郎" required>
            @error('fullName')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="email">メールアドレス</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" placeholder="例：test@example.com" required>
            @error('email')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="password">パスワード</label>
            <input type="password" id="password" name="password" placeholder="例：coachtech123" required>
            @error('password')
            <div class="error">{{ $message }}</div>
            @enderror

            <label for="password_confirmation">パスワード（確認）</label>
            <input type="password" name="password_confirmation" required>

            <button type="submit">登録</button>
        </form>
</body>

</html>