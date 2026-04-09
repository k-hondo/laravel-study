@extends('layouts.default')
@section('title', config('page_titles.menu'))

@section('content')
    <section class="bg-gray-100 pt-2">
        <div class="container mx-auto">
            <p class="text-left px-4 pt-2 text-gray-400"><a href="{{ route('index') }}"
                    class="text-blue-600 hover:underline">{{ config('page_titles.home') }}</a><span
                    class="px-2">&gt;</span>{{ config('page_titles.menu') }}</p>
            <p class="text-center pt-10 text-2xl">{{ config('page_titles.menu') }}</p>
            <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">ほっと一息つける、美味しいメニューを揃えています</h1>
        </div>
    </section>

    <!-- コンテンツ -->
    <div class="container mx-auto px-4 py-16">

        <div class="grid md:grid-cols-3 gap-8">

            <!-- カード① -->
            <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                <div class="overflow-hidden">
                    <img src="/images/menu/drink.jpg"
                        class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">ドリンクセット</h2>
                    <p class="text-gray-500 mb-2">コーヒー・紅茶から選べます</p>
                    <p class="text-blue-500 font-semibold">¥1,000</p>
                </div>
            </div>

            <!-- カード② -->
            <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                <div class="overflow-hidden">
                    <img src="/images/menu/cake.jpg"
                        class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">ケーキセット</h2>
                    <p class="text-gray-500 mb-2">日替わりスイーツ付き</p>
                    <p class="text-blue-500 font-semibold">¥1,200</p>
                </div>
            </div>

            <!-- カード③ -->
            <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                <div class="overflow-hidden">
                    <img src="/images/menu/free.jpg"
                        class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">フリードリンク</h2>
                    <p class="text-gray-500 mb-2">時間内飲み放題</p>
                    <p class="text-blue-500 font-semibold">¥1,500</p>
                </div>
            </div>

        </div>

    </div>
@endsection
