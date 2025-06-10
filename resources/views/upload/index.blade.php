<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>ファイルアップロード</title>
</head>
<body>
    <h1>ファイルをアップロード</h1>

    {{-- 成功メッセージ --}}
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    {{-- エラー表示 --}}
    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    {{-- アップロードフォーム --}}
    <form action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Excel / CSV / テキストファイルを選択：</label>
        <input type="file" name="upload_file" accept=".xlsx,.xls,.csv,.txt" required>
        <br><br>
        <button type="submit">アップロード</button>
    </form>
    <br>
    <form action="{{ route('upload.list') }}" method="GET">
        <button type="submit">アップロード済ファイル一覧を見る</button>
    </form>
</body>
</html>
