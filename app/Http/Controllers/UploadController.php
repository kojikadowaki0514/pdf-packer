<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{

    public function index() {
        return view("upload.index");
    }

    public function store(Request $request) {
        $request->validate([
            'upload_file' => 'required|file|mimes:xlsx,xls,csv,txt',
        ]);

        $file = $request->file('upload_file');

        // storage/app/uploadsに保存をする
        $path = $file->store('uploads');

        // dd([
        //     '存在するか' => $request->hasFile('upload_file'),
        //     '元のファイル名' => $file->getClientOriginalName(),
        //     '保存先' => $path,
        //     'フルパス' => storage_path("app/{$path}"),
        // ]);

        return back()->with('success', 'ファイルをアップロードしました：' . $file->getClientOriginalName());
    }

    public function list() {
        // uploadsディレクトリのファイル一覧を取得
        $files = Storage::files("uploads");

        return view("upload.list", compact("files"));
    }
}
