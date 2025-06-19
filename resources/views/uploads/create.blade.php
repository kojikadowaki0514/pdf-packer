<x-app-layout>
    <link rel="stylesheet" href="{{ asset('create.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            ファイルアップロード
        </h2>
    </x-slot>

    <form action="{{ route('uploads.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="upload-container">
            <label for="file" class="upload-label">
                アップロードするExcelファイルを選択してください
            </label>

            <div class="upload-box">
                <label for="file" class="upload-area">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt" style="font-size: 64px; color: #3498db;"></i>
                    </div>

                    <p class="upload-text"><strong>クリックしてファイルを選択</strong> またはドラッグ＆ドロップ</p>

                    <input id="file" name="file" type="file" class="upload-input" onchange="displayFileName(this)" />
                </label>
            </div>

            <!-- ファイル名表示部分 -->
            <div id="selected-filename" style="margin-top: 10px; font-weight: bold; color: #333;"></div>

            <button type="submit" class="upload-button">アップロード</button>
        </div>
    </form>
</x-app-layout>

<script>
    function displayFileName(input) {
        if (input.files.length > 0) {
            const fileName = input.files[0].name;
            document.getElementById('selected-filename').innerText = `選択されたファイル: ${fileName}`;
        }
    }
</script>
