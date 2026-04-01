<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    /**
     * お問い合わせページを表示する
     */
    public function index()
    {
        return view('contact.index');
    }

    /**
     * お問い合わせを送信する
     */
    public function sendMail(Request $request)
    {
        // バリデーション
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'max:2000'],
        ]);

        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // 登録処理(実際はメール送信などを行う)
        Log::debug($validated['name'] . 'さんよりお問い合わせがありました');
        // 完了ページへリダイレクト
        return to_route('contact.complete');
    }

    /**
     * お問い合わせ完了ページを表示する
     */
    public function complete()
    {
        return view('contact.complete');
    }
}
