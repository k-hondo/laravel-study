<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestSampleController extends Controller
{
    /**
     * GETフォームを表示する
     */
    public function form()
    {
        return view('laravel-study.form');
    }

    /**
     * クエリ文字列を処理する
     */
    public function queryStrings(Request $request)
    {
        $keyword = $request->input('keyword', '未設定');
        return "キーワードは「{$keyword}」です";
    }

    /**
     * ユーザープロフィールを表示する
     */
    public function profile($id)
    {
        return "ID: {$id}";
    }

    /**
     * 商品アーカイブを表示する
     */
    public function productsArchive(Request $request, $category, $year)
    {
        return "category: {$category}<br>year: {$year}<br>page: {$request->input('page', 1)}";
    }

    /**
     * ルートのURLを生成する
     */
    public function routeLink()
    {
        $url = route('laravel-study.profile', ['id' => 1, 'photos' => 'yes']);
        return "プロフィールページのURLは: {$url}";
    }

    public function loginForm()
    {
        return view('laravel-study.login');
    }

    /**
     * ログイン処理を行う
     */
    public function login(Request $request)
    {
        // ここでは簡単な例として、固定のメールアドレスとパスワードを使用して認証を行います。
        $email = 'user@example.com';
        $password = '12345678';
        if ($request->input('email') === $email && $request->input('password') === $password) {
            return 'ログイン成功';
        }
        return 'ログイン失敗';
    }
}
