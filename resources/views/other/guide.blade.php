<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Guide
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="flex flex-row">
            <div class="hidden md:flex flex-col items-center">
                <div class="w-32 py-5 border border-gray-300 rounded mr-4 uppercase flex flex-col items-center justify-center">
                    <div class="text-3xl font-black text-gray-500">Step 1</div>
                </div>
                <div class="h-full border-l-4 border-transparent">
                    <div class="border-l-4 mr-4 h-full border-gray-300 border-dashed"></div>
                </div>
            </div>
            <div class="flex-auto">
                <div class="flex md:flex-row flex-col items-center">
                    <div class="flex-auto">
                        <div class="p-3 text-3xl text-gray-800 font">
                            アカウント登録
                        </div>
                        <div class="px-3 pb-6">
                            意見や相談を行うためのアカウント作成を行います。登録内容は、ご自身の名前（フルネーム）、利用可能なメールアドレス、パスワードのみです。
                            登録する際のお名前は<span class="text-red-500">必ずご自身のお名前をフルネーム</span>で登録してください。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-start flex-row">
            <div class="border-t-4 border-r-4 border-transparent">
                <div class="w-16 ml-16 h-16 border-l-4 border-gray-300 border-dashed border-b-4 rounded-bl-full"></div>
            </div>
            <div class="border-t-4 border-transparent flex-auto">
                <div class="h-16 border-b-4 border-gray-300 border-dashed"></div>
            </div>
            <div class="w-16 mt-16 mr-16 h-16 border-r-4 border-gray-300 border-dashed border-t-4 rounded-tr-full"></div>
        </div>
        <div class="flex flex-row-reverse">
            <div class="hidden md:flex flex-col items-center">
                <div class="w-32 py-5 border border-gray-300 rounded ml-4 uppercase flex flex-col items-center justify-center">
                    <div class="text-3xl font-black text-gray-500">Step 2</div>
                </div>
                <div class="h-full border-r-4 border-transparent">
                    <div class="border-l-4 ml-4 h-full border-gray-300 border-dashed"></div>
                </div>
            </div>
            <div class="flex-auto rounded  border-gray-300">
                <div class="flex md:flex-row flex-col items-center">
                    <div class="flex-auto">
                        <div class="p-3 text-3xl text-gray-800 font">
                            意見をBoxに入れてみよう
                        </div>
                        <div class="px-3 pb-6">
                            アカウント登録をすると、すぐに意見を投稿することができます。
                            より良い学校生活のために「もっとこうしたらいい！」や「こんなことをして欲しい」などの意見を
                            <a href="{{ route('post.create') }}" class="text-blue-500">こちら</a>のページより投稿することができます。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-start flex-row-reverse">
            <div class="border-t-4 border-l-4 border-transparent">
                <div class="w-16 mr-16 h-16 border-r-4 border-gray-300 border-dashed border-b-4 rounded-br-full"></div>
            </div>
            <div class="border-t-4 border-transparent flex-auto">
                <div class="h-16 border-b-4 border-gray-300 border-dashed"></div>
            </div>
            <div class="w-16 mt-16 ml-16 h-16 border-l-4 border-gray-300 border-dashed border-t-4 rounded-tl-full"></div>
        </div>
        <div class="flex flex-row">
            <div class="hidden md:flex flex-col items-center">
                <div class="w-32 py-5 border border-gray-300 rounded mr-4 uppercase flex flex-col items-center justify-center">
                    <div class="text-3xl font-black text-gray-500">Step 3</div>
                </div>
                <div class="h-full border-l-4 border-transparent">
                    <div class="border-l-4 mr-4 h-full border-gray-300 border-dashed"></div>
                </div>
            </div>
            <div class="flex-auto rounded">
                <div class="flex md:flex-row flex-col items-center">
                    <div class="flex-auto">
                        <div class="p-3 text-3xl text-gray-800 font">
                            友達の意見を見てみよう
                        </div>
                        <div class="px-3 pb-6">
                            OpinionBoxでは公開されたBoxに入った意見を見ることはできます。
                            意見をBoxに入れる際にはすでに似たような意見はないか確認してみましょう。
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex items-start flex-row">
            <div class="border-t-4 border-r-4 border-transparent">
                <div class="w-16 ml-16 h-16 border-l-4 border-gray-300 border-dashed border-b-4 rounded-bl-full"></div>
            </div>
            <div class="border-t-4 border-transparent flex-auto">
                <div class="h-16 border-b-4 border-gray-300 border-dashed"></div>
            </div>
            <div class="w-16 mt-16 mr-16 h-16 border-r-4 border-gray-300 border-dashed border-t-4 rounded-tr-full"></div>
        </div>
        <div class="flex flex-row-reverse">
            <div class="hidden md:flex flex-col items-center">
                <div class="w-32 py-5 border border-gray-300 rounded ml-4 uppercase flex flex-col items-center justify-center">
                    <div class="text-3xl font-black text-gray-500">Step 4</div>
                </div>
            </div>
            <div class="flex-auto">
                <div class="flex md:flex-row flex-col items-center">
                    <div class="flex-auto">
                        <div class="p-3 text-3xl text-gray-800 font">
                            コメントをしてみよう
                        </div>
                        <div class="px-3 pb-6">
                            OpinionBoxでは自分の投稿や他の人の投稿に関してコメントすることができます。
                            その意見に関する質問や、「こうしたらいいのではないか！」などといったコメントをしてみましょう。
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
