<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class EventController extends Controller
{
    /**
     * 登録フォーム表示
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * 登録処理
     */
    public function store(Request $request)
    {
        // DBへの保存処理は今後実装予定のため、現時点ではリクエスト内容をログに出力するのみとする
        Log::debug('イベント名: ' . $request->input('title'));
        return to_route('events.create');
    }
}
