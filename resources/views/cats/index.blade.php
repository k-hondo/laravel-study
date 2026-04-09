@extends('layouts.default')
@section('title', config('page_titles.cats'))

@section('content')
    <section class="bg-gray-100 pt-2">
        <div class="container mx-auto">
            <p class="text-left px-4 pt-2 text-gray-400"><a href="{{ route('index') }}"
                    class="text-blue-600 hover:underline">{{ config('page_titles.home') }}</a><span
                    class="px-2">&gt;</span>{{ config('page_titles.cats') }}</p>
            <p class="text-center pt-10 text-2xl">{{ config('page_titles.cats') }}</p>
            <h1 class="mt-2 text-4xl font-bold font-heading text-center h-32">この子達があなたを癒やしてくれます！</h1>
        </div>
    </section>

    <section class="py-20 bg-blueGray-50">
        <div class="container px-4 mx-auto">
            <div class="flex flex-wrap">
                @foreach ($cats as $cat)
                    <div class="w-full md:w-1/2 py-5 md:px-5">
                        <div class="px-6 bg-white shadow rounded h-full py-10">
                            <div class="flex items-center mb-4">
                                <img class="h-16 w-16 rounded-full object-cover" src="{{ asset('storage/' . $cat->image) }}"
                                    alt="">
                                <div class="pl-4">
                                    <p class="text-xl">{{ $cat->name }}</p>
                                    <p class="text-blueGray-400">
                                        {{ $cat->breed }}({{ $cat->gender->label() }}{{ $cat->age }}さい)</p>
                                </div>
                            </div>
                            <p class="leading-loose text-blueGray-400 mb-5 whitespace-pre-line">{{ $cat->introduction }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection
