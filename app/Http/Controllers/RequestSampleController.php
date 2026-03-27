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
        return view('form');
    }

    /**
     * クエリ文字列を処理する
     */
    public function queryStrings(Request $request)
    {
        $keyword = $request->input('keyword', '未設定');
        return 'キーワードは「' . $keyword . '」です';
    }
}
