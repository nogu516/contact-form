<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
    <h1>FashionablyLate</h1>
</head>

<body>
    <header class="header">
        <a href="/login">login</a>
        <h2>Register</h2>
    </header>

    <form method="POST" action="{{ route('register.submit') }}">
        @csrf

        <label for="first_name">姓</label>
        <input type="text" name="first_name" value="{{ old('first_name') }}" required>
        <label for="last_name">名</label>
        <input type="text" name="last_name" value="{{ old('last_name') }}" required>
        <input type="text" id="name" name="name" placeholder="例：山田　太郎" required>
        @error('name')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="email">メールアドレス</label>
        <input type="email" id="email" name="email" placeholder="例：test@example.com" required>
        @error('email')
        <div class="error">{{ $message }}</div>
        @enderror

        <label for="password">パスワード</label>
        <input type="password" id="password" name="password" placeholder="例：coachtech123" required>
        @error('password')
        <div class="error">{{ $message }}</div>
        @enderror

        <button type="submit">登録</button>
    </form>
</body>

</html>