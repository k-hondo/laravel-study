@extends('laravel-study.layouts.default')

@section('title', '画像アップロード')
@section('content')
    {{-- メッセージを表示 --}}
    @if (session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif

    {{-- 画像アップロードフォーム --}}
    <form action="{{ route('laravel-study.photos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label>画像: <input type="file" name="image"></label>
        <button type="submit">アップロード</button>
    </form>
@endsection
