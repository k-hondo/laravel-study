@extends('laravel-study.layouts.default')

@section('title', 'イベント登録')
@section('content')
    @if (session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif
    <form action="{{ route('laravel-study.events.store') }}" method="POST">
        @csrf
        <label>イベント名: <input type="text" name="title"></label>
        <button type="submit">登録</button>
    </form>
@endsection
