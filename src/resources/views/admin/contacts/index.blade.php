<!-- 検索フォーム -->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Admin</h2>

        <form method="GET" action="{{ route('admin.contacts.index') }}" class="mb-4 d-flex flex-wrap gap-2">
            <input type="text" name="keyword" placeholder="名前かメールアドレスを入力" value="{{ request('keyword') }}">

            <select name="gender">
                <option value="all">性別</option>
                <option value="男性" {{ request('gender') == '男性' ? 'selected' : '' }}>男性</option>
                <option value="女性" {{ request('gender') == '女性' ? 'selected' : '' }}>女性</option>
                <option value="その他" {{ request('gender') == 'その他' ? 'selected' : '' }}>その他</option>
            </select>

            <select name="type">
                <option value="">お問い合わせの種類</option>
                <option value="商品のお届けについて" {{ request('type') == '商品のお届けについて' ? 'selected' : '' }}>商品のお届けについて</option>
                <option value="商品の交換について" {{ request('type') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                <option value="商品トラブル" {{ request('type') == '商品トラブル' ? 'selected' : '' }}>商品トラブル</option>
                <option value="ショップへのお問い合わせ" {{ request('type') == 'ショップへのお問い合わせ' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                <option value="その他" {{ request('type') == 'その他' ? 'selected' : '' }}>その他</option>
            </select>

            <input type="date" name="date" value="{{ request('date') }}">

            <button type="submit">検索</button>

            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">リセット</a>
        </form>

        <!-- 一覧テーブル -->
        <table class="table">
            <thead>
                <tr>
                    <th>お名前</th>
                    <th>性別</th>
                    <th>メールアドレス</th>
                    <th>お問い合わせの種類</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr>
                    <td>{{ $contact->fullname }}</td>
                    <td>{{ $contact->gender }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->type }}</td>
                    <td><button class="detailBtn" data-id="{{ $contact->id }}">詳細</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- ページネーション -->
        {{ $contacts->links() }}
        </>

        <!-- モーダルウィンドウ -->
        <div id="detailModal">
            <div class="modal-content">
                <button class="close-btn" id="closeModal">×</button>
                <h2>お問い合わせ詳細</h2>
                <p><strong>お名前:</strong> <span id="modalName"></span></p>
                <p><strong>性別:</strong> <span id="modalGender"></span></p>
                <p><strong>メール:</strong> <span id="modalEmail"></span></p>
                <p><strong>種類:</strong> <span id="modalType"></span></p>
                <p><strong>内容:</strong> <span id="modalDetail"></span></p>
                <button class="delete-btn" id="deleteBtn">削除</button>
            </div>
        </div>

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
                            $('#detailModal').css('display', 'flex');
                        }
                    });
                });

                $('#closeModal').on('click', function() {
                    $('#detailModal').removeClass('active');
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
    </div>
</body>

</html>