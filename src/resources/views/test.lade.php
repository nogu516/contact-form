<form action="{{ route('test.confirm') }}" method="POST">
    @csrf
    <input type="text" name="test" placeholder="テスト入力">
    <button type="submit">確認画面</button>
</form>