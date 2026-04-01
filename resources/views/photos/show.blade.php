@extends('layouts.default')

@section('title', 'アップロード画像の表示')
@section('content')
    {{-- アップロード完了後のメッセージを表示 --}}
    @if (session()->has('success'))
        <p>{{ session()->get('success') }}</p>
    @endif

    {{-- アップロードされた画像を表示 --}}
    <img src="{{ asset("storage/photos/{$fileName}") }}" alt="Uploaded Photo">
@endsection
