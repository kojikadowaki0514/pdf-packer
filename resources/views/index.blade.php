<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>pdf-packer</title>
    <link rel="stylesheet" href="{{ asset('index.css') }}">
</head>
<body>
    <div class="card">
        <h1>pdf-packer</h1>

        @auth
            <p>こんにちは、{{ Auth::user()->name }} さん！</p>
            <a href="{{ route('dashboard') }}">ダッシュボードへ</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">ログアウト</button>
            </form>
        @else
            <a href="{{ route('login') }}">ログイン</a><br>
            <a href="{{ route('register') }}">新規登録</a>
        @endauth
    </div>
</body>
</html>
