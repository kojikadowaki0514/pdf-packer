<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

        return back()->with('success', 'ファイルをアップロードしました：' . $file->getClientOriginalName());
    }
}
