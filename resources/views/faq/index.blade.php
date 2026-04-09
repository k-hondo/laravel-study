@extends('layouts.default')
@section('title', config('page_titles.faq'))

@section('content')
    <section class="bg-gray-100 pt-2">
        <div class="container mx-auto">
            <p class="text-left px-4 pt-2 text-gray-400"><a href="{{ route('index') }}"
                    class="text-blue-600 hover:underline">{{ config('page_titles.home') }}</a><span
                    class="px-2">&gt;</span>{{ config('page_titles.faq') }}</p>
            <p class="text-center pt-10 text-2xl">{{ config('page_titles.faq') }}</p>
            <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">ご利用に関するよくあるご質問をご案内します</h1>
        </div>
    </section>

    <!-- コンテンツ -->
    <div class="container mx-auto px-4 py-16 max-w-3xl">

        <div class="space-y-4">

            <div x-data="{ open: false }" class="bg-white rounded-xl shadow">
                <button @click="open = !open" class="w-full text-left px-6 py-4 flex justify-between items-center">
                    <span class="font-semibold">予約は必要ですか？</span>
                    <span x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" class="px-6 pb-4 text-gray-500">
                    予約なしでもご利用いただけますが、混雑時はお待ちいただく場合があります。
                </div>
            </div>

            <div x-data="{ open: false }" class="bg-white rounded-xl shadow">
                <button @click="open = !open" class="w-full text-left px-6 py-4 flex justify-between items-center">
                    <span class="font-semibold">子供は入店できますか？</span>
                    <span x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" class="px-6 pb-4 text-gray-500">
                    保護者同伴でご利用可能です。
                </div>
            </div>

            <div x-data="{ open: false }" class="bg-white rounded-xl shadow">
                <button @click="open = !open" class="w-full text-left px-6 py-4 flex justify-between items-center">
                    <span class="font-semibold">猫におやつをあげてもいいですか？</span>
                    <span x-text="open ? '-' : '+'"></span>
                </button>
                <div x-show="open" class="px-6 pb-4 text-gray-500">
                    店内で販売している専用のおやつのみ可能です。
                </div>
            </div>

        </div>

    </div>
@endsection

@push('scripts')
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endpush
