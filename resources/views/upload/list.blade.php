<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>アップロード済ファイル一覧</title>
</head>
<body>
    <h1>アップロード済みのファイル一覧</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <ul>
        @forelse($files as $file)
            <li>{{ basename($file) }}</li>
        @empty
            <li>ファイルがありません。</li>
        @endforelse
    </ul>

    <a href="{{ route('upload.index') }}">← アップロード画面に戻る</a>
</body>
</html>
