<?php

namespace App\Http\Controllers\LaravelStudy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * 登録フォーム表示
     */
    public function create()
    {
        return view('laravel-study.events.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        $title = $request->input('title');
        // DBへの保存処理は今後実装予定のため、現時点ではリクエスト内容をログに出力するのみとする
        Log::debug('イベント名: ' . $title);
        return to_route('laravel-study.events.create')->with('success', $title . 'を登録しました');
    }
}
