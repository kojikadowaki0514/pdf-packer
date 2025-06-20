<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UploadController extends Controller
{
    public function create() {
        return view('uploads.create');
    }

    // https://reffect.co.jp/laravel/how_to_upload_file_in_laravel
    public function store(Request $request) {
        $request->validate([
            'file' => 'required|file|mimes:xlsx,xls'
        ]);
        // アップロードされたファイルを取得
        $file = $request->file("file");
        // ユーザーがアップロードした時の名前を取得
        $original_name = $file->getClientOriginalName();
        // テーブルに保存する際のファイル名を作成（日付＋original_name）
        $stored_name = time()."_".$original_name;
        // 保存先の指定
        $file->storeAs('uploads', $stored_name, 'public');
        // Uploadモデルをインスタンス
        $upload = new Upload();
        // orijinal_filenameカラムにアップロードしたファイル名を取得
        $upload->original_filename = $original_name;
        // saved_filenameにアップロードした際の、日付 + 元ファイル名を取得
        $upload->saved_filename = $stored_name;
        // ログインしているユーザーのidを取得
        $upload->user_id = Auth::Id();
        // Uploadモデルに登録
        $upload->save();
        // 登録が完了したら、create.blade.phpへ遷移
        return redirect("/dashboad");
    }
}
