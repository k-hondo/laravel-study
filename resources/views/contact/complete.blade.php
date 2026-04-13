@extends('layouts.default')
@section('title', config('page_titles.contact') . '完了')

@section('content')
    <section class="relative pt-2 bg-cover bg-center" style="background-image: url('{{ asset('images/hero.jpg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        <div class="container text-white mx-auto relative">
            <p class="text-left px-4 pt-2 inline-block bg-black/50 backdrop-blur-sm rounded text-white">
                <a href="{{ route('index') }}" class="text-orange-300 hover:underline">
                    {{ config('page_titles.home') }}
                </a>
                <span class="px-2">&gt;</span>
                {{ config('page_titles.contact') }}
            </p>
            <h1 class="mt-2 text-4xl font-bold font-heading h-40 text-center p-12">{{ config('page_titles.contact') }}が完了しました
            </h1>
        </div>
    </section>

    <section class="mt-20 pb-64">
        <div class="container mx-auto text-center ">
            <p class="inline-block text-left">お問い合わせいただきありがとうございました。<br>
                通常お問い合わせから3営業日以内にご入力頂いたメールアドレスに返信させていただきます <br>
                恐れ入りますが、しばらくお待ちください。 <br>
                合わせて、info@nekocafe.xx.xx からの返信が受信できるように設定のご確認をお願い致します。 <br>
                なお、ご入力いただいたメールアドレス宛に受付完了メールを配信しております。 <br>
                完了メールが届かない場合、処理が正常に行われていない可能性があります。 <br>
                大変お手数ですが、再度お問い合わせの手続きをお願い致します。
            </p>

            <p class="pt-10"><a href="{{ route('index') }}" class="text-orange-600 hover:underline">トップページ</a>に戻る</p>
        </div>
    </section>
@endsection
