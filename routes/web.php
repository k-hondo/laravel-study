<?php

use Illuminate\Support\Facades\Route;

Route::get('/hello-world', fn() => view('hello_world'));
Route::get('/hello', fn() => view('hello', [
    'name' => '山田',
    'course' => 'Laravel'
]));

// トップページ
Route::get('/', fn() => view('index'));

// カリキュラムページ
Route::get('/curriculum', fn() => view('curriculum'));
