@extends('laravel-study.layouts.default')

@section('title', 'アップロード画像の表示')
@section('content')
    {{-- アップロード完了後のメッセージを表示 --}}
    @if (session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif

    {{-- アップロードされた画像を表示 --}}
    <img src="{{ asset("storage/photos/{$fileName}") }}" alt="Uploaded Photo">

    {{-- 削除ボタン --}}
    <form action="{{ route('laravel-study.photos.destroy', ['photo' => $fileName]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" onclick="return confirm('削除してもよろしいですか？')">削除</button>
    </form>

    {{-- ダウンロードリンク --}}
    <a href="{{ route('laravel-study.photos.download', ['photo' => $fileName]) }}">ダウンロード</a>

@endsection
