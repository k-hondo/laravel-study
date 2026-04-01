<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

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
        $fileName = pathinfo($savedFilePath, PATHINFO_BASENAME);
        // ログに保存したファイルパス、ファイル名を出力
        Log::debug($savedFilePath);
        Log::debug($fileName);

        // アップロード完了後、画像表示画面にリダイレクト
        return to_route('photos.show', ['photo' => $fileName])->with('success', 'アップロードしました');
    }

    /**
     * アップロード画像の表示
     */
    public function show(string $fileName)
    {
        // 画像表示用のビューを返す
        return view('photos.show', ['fileName' => $fileName]);
    }

    /**
     * アップロード画像の削除処理
     */
    public function destroy(string $fileName)
    {
        // ストレージからファイルを削除
        Storage::disk('public')->delete("photos/{$fileName}");
        // 削除完了後、アップロード画面にリダイレクト
        return to_route('photos.create')->with('success', '削除しました');
    }
}
