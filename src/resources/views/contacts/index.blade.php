<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
        </div>
    </header>

    <main>
        <div class="contact-form__content">
            <div class="heading">
                <h2>Contact</h2>
            </div>
            <div class="contact-form__body">
                <form class="form" action="{{ route('contacts.confirm') }}" method="post">
                    @csrf
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="text-red-500">お名前</span>
                            <label class="contact-form__label">※</label>
                            <input type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                            @error('last_name')<div>{{ $message }}</div>@enderror

                            <input type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" style=" margin-left: 20px;">
                            @error('first_name')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="text-red-500">性別</span>
                            <label class="contact-form__label">※</label>
                            <input type="radio" name="gender" value="男性" {{ old('gender', '男性') == '男性' ? 'checked' : '' }}> 男性
                            <input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}> 女性
                            <input type="radio" name="gender" value="その他" {{ old('gender') == 'その他' ? 'checked' : '' }}> その他
                            @error('gender')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <!-- メールアドレス -->
                            <span class="text-red-500">メールアドレス</span>
                            <label class="contact-form__label">※</label>
                            <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                            @error('email')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="text-red-500">電話番号</span><label class="contact-form__label">※</label>
                            <input type="tel" name="tel" placeholder="例: 09012345678" value="{{ old('tel') }}">
                            @error('tel')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="text-red-500">住所</span><label class="contact-form__label">※</label>
                            <input type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                            @error('address')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <span class="text-red-500">建物</span>
                            <input type="text" name="build" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('build') }}">
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <!-- お問い合わせの種類 -->
                            <span class="text-red-500">お問い合わせの種類</span><label class="contact-form__label">※</label>
                            <select name="content_type">
                                <option value="">選択してください</option>
                                <option value="商品のお届けについて" {{ old('content_type') == '商品のお届けについて' ? 'selected' : '' }}>商品のお届けについて</option>
                                <option value="商品の交換について" {{ old('content_type') == '商品の交換について' ? 'selected' : '' }}>商品の交換について</option>
                                <option value="商品トラブル" {{ old('content_type') == '商品トラブル' ? 'selected' : '' }}>商品トラブル</option>
                                <option value="ショップへのお問い合わせ" {{ old('content_type') == 'ショップへのお問い合わせ' ? 'selected' : '' }}>ショップへのお問い合わせ</option>
                                <option value="その他" {{ old('content_type') == 'その他' ? 'selected' : '' }}>その他</option>
                            </select>
                            @error('content_type')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__group">
                        <div class="form__group-title">
                            <!-- お問い合わせ内容 -->
                            <span class="text-red-500">お問い合わせ内容</span><label class="contact-form__label">※</label>
                            <textarea name="content">{{ old('content') }}</textarea>
                            @error('content')<div>{{ $message }}</div>@enderror
                        </div>
                    </div>
                    <div class="form__button">
                        <button class="form__button-submit" type="submit">確認画面</button>
                    </div>
                </form>
            </div>
        </div>
    </main>
</body>

</html>