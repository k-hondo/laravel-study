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

    /**
     * ユーザープロフィールを表示する
     */
    public function profile($id)
    {
        return 'ID: ' . $id;
    }

    /**
     * 商品アーカイブを表示する
     */
    public function productsArchive(Request $request, $category, $year)
    {
        return 'category: ' . $category . '<br>year: ' . $year . '<br>page: ' . $request->input('page', 1);
    }
}
