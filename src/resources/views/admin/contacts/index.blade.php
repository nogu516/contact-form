<!-- 検索フォーム -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <form method="GET" action="{{ route('admin.contacts.index') }}" class="flex gap-2">

        <input type="text" name="keyword" placeholder="名前かメールアドレス" class="border px-3 py-1 rounded">

        <select name="gender" class="border px-2 py-1 rounded">
            <option value="">性別</option>
            <option value="男性">男性</option>
            <option value="女性">女性</option>
        </select>

        <select name="type" class="border px-2 py-1 rounded">
            <option value="">お問い合わせの種類</option>
            <option value="商品の交換について">商品の交換について</option>
            <!-- 他の種類 -->
        </select>

        <input type="date" name="date" class="border px-2 py-1 rounded">

        <button type="submit" class="bg-brown-600 text-white px-4 py-1 rounded">検索</button>

        <a href="{{ route('admin.contacts.index') }}" class="bg-gray-400 text-white px-4 py-1 rounded">リセット</a>

    </form>

    <!-- 一覧テーブル -->
    <table class="w-full mt-4 border-collapse">
        <thead class="bg-brown-600 text-white">
            <tr>
                <th class="py-2 px-4 border">お名前</th>
                <th class="py-2 px-4 border">性別</th>
                <th class="py-2 px-4 border">メールアドレス</th>
                <th class="py-2 px-4 border">お問い合わせの種類</th>
                <th class="py-2 px-4 border"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contacts as $contact)
            <tr class="border-b">
                <td class="py-2 px-4">{{ name }}</td>
                <td class="py-2 px-4">{{ gender }}</td>
                <td class="py-2 px-4">{{ email }}</td>
                <td class="py-2 px-4">{{ content_type }}</td>
                <td class="py-2 px-4">
                    <a href="{{ route('admin.contacts.show', $contact->id) }}"
                        class="bg-gray-300 px-3 py-1 rounded">詳細</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ページネーション -->
    <div class="mt-4">
        {{ $contacts->links() }}
    </div>
</body>

</html>