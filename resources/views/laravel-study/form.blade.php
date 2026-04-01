@extends('laravel-study.layouts.default')

@section('title', 'GETフォーム')
@section('content')
    <form action="{{ route('laravel-study.query-strings') }}" method="get">
        <label>キーワード: <input type="text" name="keyword" placeholder="キーワード"></label>
        <button type="submit">送信</button>
    </form>
@endsection
