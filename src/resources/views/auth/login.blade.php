<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    Fashionably Late
    <a href="{{ route('register.show') }}"
        class="inline-block px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded">
        register
    </a>
</head>

<body>
    <h2>Login</h2>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">メールアドレス</label>
            <input type="email" name="email" value="{{ old('email') }}">
            @error('email')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">パスワード</label>
            <input type="password" name="password">
            @error('password')
            <div class="text-red-600">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">ログイン</button>
    </form>
</body>

</html>