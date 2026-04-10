@extends('laravel-study.layouts.default')

@section('title', 'さぁ、はじめよう')
@section('content')
    <p>
        Laravelの学習をはじめての方をサポートする学習サイトです<br>
        このサイトでは、Laravelの基礎だけでなく開発環境構築やデータベースに関しても解説します<br>
        これから学習を始めるににあたり、まずは下記の内容をご確認下さい<br>
        ~~~~ 以下省略 ~~~~
    </p>
    <ul>
        <li>Hello系<ul>
                <li><a href="/laravel-study/hello-world">Hello World 1</a></li>
                <li><a href="/laravel-study/hello">Hello World 2</a></li>
            </ul>
        </li>
        <li>カリキュラム<ul>
                <li><a href="{{ route('laravel-study.curriculum') }}">カリキュラム</a></li>
            </ul>
        </li>
        <li>ユーティリティ<ul>
                <li><a href="{{ route('laravel-study.world-time') }}">世界時間</a></li>
            </ul>
        </li>
        <li>ゲーム<ul>
                <li><a href="{{ route('laravel-study.omikuji') }}">おみくじ</a></li>
                <li><a href="{{ route('laravel-study.monty-hall') }}">モンティホール</a></li>
                <li><a href="{{ route('laravel-study.hi-low') }}">ハイロー</a></li>
            </ul>
        </li>
        <li>リクエスト<ul>
                <li><a href="{{ route('laravel-study.form') }}">フォーム</a></li>
                <li><a href="{{ route('laravel-study.profile', ['id' => 1]) }}">ユーザ詳細</a></li>
                <li><a
                        href="{{ route('laravel-study.products-archive', ['category' => 'electronics', 'year' => 2023]) }}">商品アーカイブ</a>
                </li>
                <li><a href="{{ route('laravel-study.route-link') }}">ルートリンク</a></li>
                <li><a href="{{ route('laravel-study.login-form') }}">ログイン</a></li>
            </ul>
        </li>
        <li>イベント<ul>
                <li><a href="/laravel-study/events/create">イベント登録</a></li>
            </ul>
        </li>
        <li>ファイル管理<ul>
                <li><a href="/laravel-study/photos/create">画像アップロード</a></li>
            </ul>
        </li>
    </ul>
@endsection
