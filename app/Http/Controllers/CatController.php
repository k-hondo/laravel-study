<?php

namespace App\Http\Controllers;

use App\Models\Cat;

class CatController extends Controller
{
    /**
     * ねこちゃんたちの一覧を表示する
     */
    public function index()
    {
        $cats = Cat::latest()->get();
        return view('cats.index', compact('cats'));
    }
}
