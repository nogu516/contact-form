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
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <dl>
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
                                <p>お名前：{{ $inputs['last_name'] }} {{ $inputs['first_name'] }}</p>
                                <p>性別：{{ $inputs['gender'] }}</p>
                                <p>メールアドレス：{{ $inputs['email'] }}</p>
                                <p>電話番号：{{ $inputs['tel'] }}</p>
                                <p>住所：{{ $inputs['address'] }}</p>
                                <p>建物：{{ $inputs['build'] }}</p>
                                <p>お問い合わせの種類：{{ $inputs['content_type'] }}</p>
                                <p>お問い合わせ内容：{{ $inputs['content'] }}</p>

                                <!-- ボタン -->
                                <div class="form__button">
                                    <button class="form__button-submit" type="submit">送信</button>
                                    <button type="button" onclick="history.back()">修正</button>
                                </div>
                            </form>
                        </dl>
                    </table>
                </div>
            </form>
        </div>
    </main>
</body>

</html>