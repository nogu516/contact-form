<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <a class="header__logo" href="/">
                FashionablyLate
            </a>
        </div>
    </header>

    <main>
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>confirm</h2>
            </div>
            <form class="form" action="{{ route('contacts.store') }}" method="post">
                @csrf
                <input type="hidden" name="action" value="submit">
                <input type="hidden" name="last_name" value="{{ $inputs['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $inputs['first_name'] }}">
                <input type="hidden" name="gender" value="{{ $inputs['gender'] }}">
                <input type="hidden" name="email" value="{{ $inputs['email'] }}">
                <input type="hidden" name="tel" value="{{ $inputs['tel'] }}">
                <input type="hidden" name="address" value="{{ $inputs['address'] }}">
                <input type="hidden" name="build" value="{{ $inputs['build'] }}">
                <input type="hidden" name="content_type" value="{{ $inputs['content_type'] }}">
                <input type="hidden" name="content" value="{{ $inputs['content'] }}">

                <!-- 表示用 -->
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr>
                            <th>お名前</th>
                            <td>{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</td>
                        </tr>
                        <tr>
                            <th>性別</th>
                            <td>{{ $inputs['gender'] }}</td>
                        </tr>
                        <tr>
                            <th>メールアドレス</th>
                            <td>{{ $inputs['email'] }}</td>
                        </tr>
                        <tr>
                            <th>電話番号</th>
                            <td>{{ $inputs['tel'] }}</td>
                        </tr>
                        <tr>
                            <th>住所</th>
                            <td>{{ $inputs['address'] }}</td>
                        </tr>
                        <tr>
                            <th>建物名</th>
                            <td>{{ $inputs['build'] }}</td>
                        </tr>
                        <tr>
                            <th>お問い合わせの種類</th>
                            <td>{{ $inputs['content_type'] }}</td>
                        </tr>
                        <tr>
                            <th>お問い合わせ内容</th>
                            <td>{{ $inputs['content'] }}</td>
                        </tr>
                    </table>
                </div>

                <!-- ボタン -->
                <div class="form__button">
                    <button class="form__button-submit" type="submit">送信</button>
                    <a href="/" class="form__button-submit">修正</a>
                </div>
            </form>
        </div>
    </main>
</body>

</html>