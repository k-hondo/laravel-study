<!DOCTYPE html>
<html lang="ja">

<head>
    <title>@yield('title', 'ねこカフェららべる')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
    <link rel="stylesheet" href="/css/tailwind/tailwind.min.css">

    <link rel="icon" type="image/png" sizes="16x16" href="/favicon.png">
    <script src="/js/main.js"></script>
</head>

<body class="antialiased bg-body text-body font-body flex flex-col min-h-screen">

    <!-- ▼▼▼▼共通ヘッダー▼▼▼▼　-->
    <header class="bg-gradient-to-r from-amber-100 to-orange-100 border-b border-amber-200 shadow-sm">
        <div class="container px-4 mx-auto">
            <nav class="flex items-center justify-between py-6">

                <!-- ロゴ -->
                <a class="text-3xl font-semibold text-amber-900" href="{{ route('index') }}">
                    ねこカフェららべる
                </a>

                <!-- メニュー -->
                <ul class="hidden lg:flex ml-12 mr-auto space-x-10">

                    <li>
                        <a href="{{ route('facilities') }}"
                            class="text-sm transition duration-200
                        {{ request()->routeIs('facilities') ? 'text-orange-400 font-bold' : 'text-stone-500 hover:text-orange-400' }}">
                            設備
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('cats.index') }}"
                            class="text-sm transition duration-200
                        {{ request()->routeIs('cats.index') ? 'text-orange-400 font-bold' : 'text-stone-500 hover:text-orange-400' }}">
                            ねこちゃんたち
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('blogs.index') }}"
                            class="text-sm transition duration-200
                        {{ request()->routeIs('blogs.index') ? 'text-orange-400 font-bold' : 'text-stone-500 hover:text-orange-400' }}">
                            ブログ
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('menu') }}"
                            class="text-sm transition duration-200
                        {{ request()->routeIs('menu') ? 'text-orange-400 font-bold' : 'text-stone-500 hover:text-orange-400' }}">
                            メニュー
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('faq') }}"
                            class="text-sm transition duration-200
                        {{ request()->routeIs('faq') ? 'text-orange-400 font-bold' : 'text-stone-500 hover:text-orange-400' }}">
                            よくあるご質問
                        </a>
                    </li>

                </ul>

                <!-- ボタン -->
                <div class="flex items-center">

                    <!-- サブボタン -->
                    <a href="{{ route('contact') }}"
                        class="mr-2 px-4 py-2 text-xs text-amber-900 border border-amber-300 rounded
                    hover:bg-amber-200 hover:shadow-md hover:-translate-y-0.5
                    transition duration-200">
                        お問い合わせ
                    </a>

                    <!-- メインボタン -->
                    <a href="{{ route('index') }}#access"
                        class="px-4 py-2 text-xs font-semibold bg-orange-400 text-white rounded
                    hover:bg-orange-500 hover:shadow-lg hover:-translate-y-1
                    transition duration-200">
                        アクセス
                    </a>

                </div>

            </nav>
        </div>
    </header>
    <!-- ▲▲▲▲共通ヘッダー▲▲▲▲　-->

    <!-- ▼▼▼▼ページ毎の個別内容▼▼▼▼　-->
    <main class="flex-grow">
        @yield('content')
    </main>
    <!-- ▲▲▲▲ページ毎の個別内容▲▲▲▲　-->

    <!-- ▼▼▼▼共通フッター▼▼▼▼　-->
    <footer class="bg-black">
        <div class="px-4 container mx-auto p-10 flex justify-between">
            <div class="text-white text-left">
                <h2 class="text-xl font-semibold">ねこカフェららべる</h2>
                <p>〒123-4567</p>
                <p>東京都墨田区押上1-2-3 Illuminateビル9F</p>
            </div>

            <ul class="text-white text-left hidden md:flex flex-wrap flex-col h-12 md:w-128">
                <li class="ml-6"><a href="{{ route('index') }}" class="hover:underline">ホーム</a></li>
                <li class="ml-6"><a href="{{ route('facilities') }}" class="hover:underline">設備</a></li>
                <li class="ml-6"><a href="{{ route('cats.index') }}" class="hover:underline">ねこちゃんたち</a></li>
                <li class="ml-6"><a href="{{ route('blogs.index') }}" class="hover:underline">ブログ</a></li>
                <li class="ml-6"><a href="{{ route('index') }}#access" class="hover:underline">アクセス</a></li>
                <li class="ml-6"><a href="{{ route('faq') }}" class="hover:underline">よくあるご質問</a></li>
                <li class="ml-6"><a href="{{ route('contact') }}" class="hover:underline">お問い合わせ</a></li>
                <li class="ml-6"><a href="#" class="hover:underline">プライバシーポリシー</a></li>
            </ul>
        </div>
    </footer>
    <!-- ▲▲▲▲共通フッター▲▲▲▲　-->

    @stack('scripts')
</body>

</html>
