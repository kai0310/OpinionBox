<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet"/>

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        @livewireStyles

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-dropdown')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>

            <!-- Page Footer -->
            <div class="bg-gray-100">
                <div class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-center">
                    <div class="p-5 w-48 ">
                        <div class="text-xs uppercase text-gray-500 font-medium">Home</div>
                        <a class="my-3 block" href="/">Service</a>
                        <a class="my-3 block" href="{{ route('dashboard') }}">Top</a>
                        <a class="my-3 block" href="{{ route('about') }}">About Us</a>
                    </div>
                    <div class="p-5 w-48 ">
                        <div class="text-xs uppercase text-gray-500 font-medium">Box</div>
                        <a class="my-3 block" href="{{ route('post.index') }}">トップ</a>
                        <a class="my-3 block" href="{{ route('post.create') }}">新規作成</a>
                        <a class="my-3 block" href="{{ route('post.me') }}">自分の投稿</a>
                        <a class="my-3 block" href="{{ route('post.all') }}">全ての投稿</a>
                    </div>
                    <div class="p-5 w-48 ">
                        <div class="text-xs uppercase text-gray-500 font-medium">Resources</div>
                        <a class="my-3 block" href="{{ route('guide') }}">Guide</a>
                        <a class="my-3 block" href="{{ route('faq') }}">FAQ</a>
                        <a class="my-3 block" href="https://github.com/kai0310/OpinionBox/blob/2.x/LICENSE" target="_blank">LICENSE</a>
                    </div>
                    <div class="p-5 w-48 ">
                        <div class="text-xs uppercase text-gray-500 font-medium">Contact us</div>
                        <a class="my-3 block" href="https://github.com/kai0310/OpinionBox" target="_blank">GitHub-Repo</a>
                        <a href="https://github.com/kai0310/OpinionBox/graphs/contributors" target="_blank">Contributor</a>
                    </div>
                </div>
            </div>

            <div class="bg-gray-100 pt-2 ">
                <div class="flex pb-5 px-3 m-auto pt-5 border-t text-gray-800 text-sm flex-col
      md:flex-row max-w-6xl">
                    <div class="mt-2">
                        Licensed under the <a href="https://github.com/kai0310/OpinionBox/blob/main/LICENSE" target="_blank">Apache License, Version 2.0</a><br />
                        © Copyright 2020 <a href="https://github.com/kai0310" target="_blank">kai0310</a>. All Rights Reserved.
                    </div>
                    <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                        <a href="https://github.com/kai0310/OpinionBox" class="w-12 mx-1" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
