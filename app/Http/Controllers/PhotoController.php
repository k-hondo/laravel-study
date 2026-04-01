<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PhotoController extends Controller
{
    /**
     * アップロード画面
     */
    public function create()
    {
        // アップロード画面を表示
        return view('photos.create');
    }

    /**
     * アップロード処理
     */
    public function store(Request $request)
    {
        // アップロードされたファイルを保存
        $savedFilePath = $request->file('image')->store('photos', 'public');
        // ログに保存したファイルのパスを出力
        Log::debug($savedFilePath);

        // アップロード完了後、アップロード画面にリダイレクト
        return to_route('photos.create')->with('success', 'アップロードしました');
    }
}
