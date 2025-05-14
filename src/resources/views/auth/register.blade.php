<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="bg-gray-100 py-10">
    @if (session('success'))
    <div class="p-4 mb-4 text-sm text-green-700 bg-green-100 rounded-lg" role="alert">
        {{ session('success') }}
    </div>
    @endif
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                Fashionably Late
            </a>
            <div class="mt-4 text-center">
                <a href="{{ route('login') }}"
                    class="inline-block px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold rounded">
                    login
                </a>
            </div>

        </div>
    </header>
    <div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md">
        <h2 class="text-2xl font-bold mb-4">Register</h2>

        <form method="POST" action="{{ route('register.submit') }}">
            @csrf

            <div class="mb-4">
                <label for="name" class="block font-semibold">お名前</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}"
                    class="w-full border rounded px-3 py-2">
                @error('name')
                <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="email" class="block font-semibold">メールアドレス</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                    class="w-full border rounded px-3 py-2">
                @error('email')
                <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block font-semibold">パスワード</label>
                <input type="password" name="password" id="password"
                    class="w-full border rounded px-3 py-2">
                @error('password')
                <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="password_confirmation" class="block font-semibold">パスワード（確認）</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border rounded px-3 py-2" required>
                @error('password_confirmation')
                <div class="text-red-600 mt-1 text-sm">{{ $message }}</div>
                @enderror
            </div>
    </div>
    <div class="text-center mt-4">
        <button type="submit"
            class="px-6 py-2 bg-blue-600 text-white font-semibold rounded hover:bg-blue-700">
            登録する
        </button>
        </form>
    </div>
</body>

</html>