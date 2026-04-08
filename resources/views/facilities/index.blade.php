@extends('layouts.default')
@section('title', '設備')

@section('content')
    <section class="bg-gray-100">
        <div class="container mx-auto">
            <p class="text-left px-4 pt-2"><a href="{{ route('index') }}" class="text-blue-600 hover:underline">ホーム</a>&gt;設備
            </p>
            <p class="text-center pt-10 text-2xl">設備</p>
            <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">設備について</h1>
        </div>
    </section>

    <!-- コンテンツ -->
    <div class="container mx-auto px-4 py-16">

        <div class="grid md:grid-cols-3 gap-8">

            <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                <div class="overflow-hidden">
                    <img src="/images/facilities/space.jpg"
                        class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">くつろぎスペース</h2>
                    <p class="text-gray-500">
                        ゆったりとしたソファ席で、ねこちゃんと癒しの時間を過ごせます。
                    </p>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                <div class="overflow-hidden">
                    <img src="/images/facilities/clean.jpg"
                        class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">清潔な環境</h2>
                    <p class="text-gray-500">
                        毎日の清掃と衛生管理で、安心してご利用いただけます。
                    </p>
                </div>
            </div>

            <div class="group bg-white rounded-2xl shadow hover:shadow-xl transition overflow-hidden">
                <div class="overflow-hidden">
                    <img src="/images/facilities/wifi.jpg"
                        class="w-full h-56 object-cover group-hover:scale-110 transition duration-500">
                </div>
                <div class="p-6">
                    <h2 class="text-xl font-bold mb-2">Wi-Fi完備</h2>
                    <p class="text-gray-500">
                        作業や読書にも最適な環境をご用意しています。
                    </p>
                </div>
            </div>

        </div>

    </div>
@endsection
