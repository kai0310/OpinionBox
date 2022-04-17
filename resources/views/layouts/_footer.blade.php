<footer>
    <div class="bg-gray-100">
        <div class="max-w-6xl m-auto text-gray-800 flex flex-wrap justify-center">
            <div class="p-5 w-50">
                <div class="text-xs uppercase text-gray-500 font-medium">
                    Home
                </div>
                <a class="my-3 block" href="{{ route('dashboard') }}">
                    Top
                </a>
                <a class="my-3 block" href="{{ route('about') }}">
                    About Us
                </a>
                <a class="my-3 block" href="{{ route('terms.show') }}" target="_blank">
                    {{ __('利用規約') }}
                </a>
                <a class="my-3 block" href="{{ route('policy.show') }}" target="_blank">
                    {{ __('プライバシーポリシー') }}
                </a>

            </div>
            <div class="p-5 w-48 ">
                <div class="text-xs uppercase text-gray-500 font-medium">
                    Box
                </div>
                <a class="my-3 block" href="{{ route('post.index') }}">
                    {{ __('トップ') }}
                </a>
                <a class="my-3 block" href="{{ route('post.create') }}">
                    {{ __('新規作成') }}
                </a>
                <a class="my-3 block" href="{{ route('post.me') }}">
                    {{ __('自分の投稿') }}
                </a>
                <a class="my-3 block" href="{{ route('post.all') }}">
                    {{ __('全ての投稿') }}
                </a>
            </div>
            <div class="p-5 w-48 ">
                <div class="text-xs uppercase text-gray-500 font-medium">
                    Resources
                </div>
                <a class="my-3 block" href="{{ route('guide') }}">
                    {{ __('ガイド') }}
                </a>
                <a class="my-3 block" href="{{ route('faq') }}">
                    {{ __('よくある質問') }}
                </a>
                <a class="my-3 block" href="{{ config('opinion-box.github.license') }}" target="_blank">
                    LICENSE
                </a>
                <a class="my-3 block" href="{{ config('opinion-box.wiki') }}" target="_blank">
                    {{ __('公式マニュアル') }}
                </a>
            </div>
            <div class="p-5 w-48 ">
                <div class="text-xs uppercase text-gray-500 font-medium">
                    Contact us
                </div>
                <a href="{{ config('opinion-box.github.repository') }}" target="_blank" class="my-3 block">
                    GitHub
                </a>
                <a href="{{ config('opinion-box.github.contributors') }}" target="_blank">
                    Contributor
                </a>
            </div>
        </div>
    </div>

    <div class="bg-gray-100 pt-2 ">
        <div class="flex pb-5 px-3 m-auto pt-5 border-t text-gray-800 text-sm flex-col
          md:flex-row max-w-6xl">
            <div class="mt-2 text-gray-500">
                Licensed under the
                <a href="{{ config('opinion-box.github.license') }}" target="_blank"
                >Apache License, Version 2.0</a><br/>
                © Copyright 2020 - {{ date('Y') }}
                <a href="{{ config('opinion-box.github.author') }}" target="_blank">
                    kai0310
                </a>.
                All Rights Reserved.
            </div>
            <div class="md:flex-auto md:flex-row-reverse mt-2 flex-row flex">
                <a href="{{ config('opinion-box.github.repository') }}" class="w-24 mx-1" target="_blank">
                    <i class="fab fa-github text-lg"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
