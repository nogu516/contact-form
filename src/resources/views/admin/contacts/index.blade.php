<!-- 検索フォーム -->
<!DOCTYPE html>
<html lang="jp">

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
                <td class="py-2 px-4">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                <td class="py-2 px-4">{{ $contact->gender }}</td>
                <td class="py-2 px-4">{{ $contact->email }}</td>
                <td class="py-2 px-4">{{ $contact->content_type }}</td>
                <td class="py-2 px-4">
                    <a href="javascript:void(0);"
                        data-id="{{ $contact->id }}"
                        class="showDetail bg-gray-300 px-3 py-1 rounded">
                        詳細
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <!-- ページネーション -->
    <div class="mt-4">
        {{ $contacts->links() }}
    </div>

    <!-- モーダル本体 -->
    <div id="detailModal" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white p-6 rounded-lg w-1/2 relative">
            <button id="closeModal" class="absolute top-2 right-2 text-xl">×</button>
            <h2 class="text-xl font-bold mb-4">お問い合わせ詳細</h2>
            <div id="modalContent">
                <p>読み込み中...</p>
            </div>
        </div>
    </div>

    <!-- モーダルウィンドウ -->
    <div id="detailModal" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center hidden">
        <div class="bg-white p-6 rounded-lg w-[400px] relative">
            <button id="closeModal" class="absolute top-2 right-2 text-gray-500">×</button>
            <h2 class="text-xl font-bold mb-4">お問い合わせ詳細</h2>
            <p><strong>お名前:</strong> <span id="modalName"></span></p>
            <p><strong>性別:</strong> <span id="modalGender"></span></p>
            <p><strong>メール:</strong> <span id="modalEmail"></span></p>
            <p><strong>種類:</strong> <span id="modalType"></span></p>
            <p><strong>内容:</strong> <span id="modalDetail"></span></p>

            <button id="deleteBtn" class="bg-red-500 text-white px-4 py-1 mt-4 rounded">削除</button>
        </div>
    </div>
    <td>
        <button class="detailBtn bg-gray-300 px-3 py-1 rounded" data-id="{{ $contact->id }}">詳細</button>
    </td>

    <!-- ↓↓↓ jQueryとスクリプトをここに記載 ↓↓↓ -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(function() {
            let currentId = null;

            $('.detailBtn').on('click', function() {
                const id = $(this).data('id');
                currentId = id;

                $.ajax({
                    url: `/admin/contacts/${id}`,
                    type: 'GET',
                    success: function(data) {
                        $('#modalName').text(data.last_name + ' ' + data.first_name);
                        $('#modalGender').text(data.gender);
                        $('#modalEmail').text(data.email);
                        $('#modalType').text(data.content_type);
                        $('#modalDetail').text(data.detail);
                        $('#detailModal').removeClass('hidden');
                    }
                });
            });

            $('#closeModal').on('click', function() {
                $('#detailModal').addClass('hidden');
            });

            $('#deleteBtn').on('click', function() {
                if (confirm('本当に削除しますか？')) {
                    $.ajax({
                        url: `/admin/contacts/${currentId}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function() {
                            alert('削除しました');
                            location.reload();
                        },
                        error: function() {
                            alert('削除に失敗しました');
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>