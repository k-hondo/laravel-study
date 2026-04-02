<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;

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
    public function sendMail(ContactRequest $request)
    {
        // バリデーション
        $validated = $request->validated();

        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // メール送信
        Mail::to('admin@example.com')->send(new ContactAdminMail());
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
