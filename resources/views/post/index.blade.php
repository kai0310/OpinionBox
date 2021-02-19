<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            Box
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="px-4 sm:px-0">
            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                もっとOpinionBoxを活用しよう
            </h1>
            <p class="mt-2 text-gray-600">
                OpinionBoxはよりたくさんの意見を集約し、改善されるように様々な機能があります。<br/>
                OpinionBoxを用いて私たちでより良い学校へとしましょう。
            </p>
        </div>
        <section class="max-w-6xl mx-auto px-10 py-6">
            <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <a href="{{ route('post.create') }}">
                        <div class="border border-gray-300 p-6 rounded-lg bg-white">
                            <div
                                class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4">
                                <i class="fas fa-comments"></i>
                            </div>
                            <h2 class="text-lg  font-medium title-font mb-2">意見を投稿してみよう</h2>
                            <p class="leading-relaxed text-base">あなたもOpinionBoxを使って意見を投稿してみましょう。</p>
                        </div>
                    </a>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <a href="{{ route('post.all') }}">
                        <div class="border border-gray-300 p-6 rounded-lg bg-white">
                            <div
                                class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 italic">
                                <i class="fas fa-thumbs-up"></i>
                            </div>
                            <h2 class="text-lg  font-medium title-font mb-2">意見を探してみよう</h2>
                            <p class="leading-relaxed text-base">OpinionBoxでは、公開中の他の人の意見を見ることができます。</p>
                        </div>
                    </a>
                </div>
                <div class="xl:w-1/3 md:w-1/2 p-4">
                    <div class="border border-gray-300 p-6 rounded-lg bg-white">
                        <div
                            class="w-10 h-10 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-4 italic">
                            <i class="fas fa-comment-dots"></i>
                        </div>
                        <h2 class="text-lg  font-medium title-font mb-2">
                            コメントをしてみよう
                        </h2>
                        <p class="leading-relaxed text-base">
                            OpinionBoxでは公開中の意見にコメントをすることもできます。
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <div class="px-4 sm:px-0">
            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                公開中の意見
            </h1>
            <p class="mt-2 text-gray-600">
                公開されているBoxの中に入った意見をランダムに表示しています。
            </p>
        </div>
        <div class="flex flex-col mt-3">
            @forelse($posts as $post)
                <div class="mt-6">
                    <x-article-list-item :post="$post"/>
                </div>
            @empty
                <div class="mt-6">
                    <div class="mx-auto max-w-4xl px-10 py-6 text-center bg-white rounded-lg shadow-md">
                        <h1 class="text-gray-700 font-bold cursor-pointer">
                            まだ表示できる意見がない様です
                        </h1>
                    </div>
                </div>
            @endforelse
            @if ( count($posts) )
                <div class="mt-6">
                    <div class="mx-auto max-w-4xl px-10 py-6 text-center bg-white rounded-lg shadow-md">
                        <a
                            href="{{ route('post.all') }}"
                            class="text-gray-700 font-bold hover:underline cursor-pointer"
                        >
                            他の意見も見る
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
