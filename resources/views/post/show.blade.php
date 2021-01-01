<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            <div class="flex items-center">
                <div>
                    <a href="{{ route('post.index') }}">
                        Box<i class="fas fa-angle-right mx-3 hidden md:inline-block"></i>
                    </a>
                    <a href="{{ route('post.all') }}">
                        全ての投稿<i class="fas fa-angle-right mx-3 hidden md:inline-block"></i>
                    </a>
                    <p class="hidden md:inline-block max-w-xs truncate align-middle">
                        {{ $post->title }}
                    </p>
                </div>
                <livewire:admin.permit-button :post="$post" />
            </div>
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex justify-between container mx-auto">
                <div class="w-full">
                    <div class="px-4 sm:px-0">
                        @if($post->created_at->diff(now())->m > 0)
                            <div class="flex bg-yellow-50 max-12 mb-4">
                                <div class="w-auto text-grey-darker items-center p-4">
                                    <p class="leading-tight">
                                        この意見は1ヶ月以上前に投稿されています
                                    </p>
                                </div>
                            </div>
                        @endif
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            {{ $post->title }}について
                        </h1>
                        <p class="mt-2 text-gray-600">
                            現在選択中のOpinionBoxに入った意見を表示しています。
                        </p>
                    </div>
                    <div class="flex bg-green-100 max-12 my-4">
                        <div class="w-auto text-grey-darker items-center p-4">
                            <span class="text-lg font-bold pb-4">コメントをしてみよう！</span>
                            <p class="leading-tight">共感した投稿や何か提案がある投稿にはコメントをしてみましょう</p>
                        </div>
                    </div>
                    <div class="flex flex-col mt-3">
                        <div class="mt-6">
                            <div class="px-10 py-6 bg-white rounded-lg shadow-md">
                                <div class="mt-2">
                                    <h3 class="text-2xl text-gray-700 font-bold">
                                        {{ $post->title }}
                                    </h3>
                                    <p class="mt-2 text-gray-600 break-words">
                                        {!! nl2br($post->content) !!}
                                    </p>
                                </div>
                                <div class="flex justify-end items-center mt-4">
                                    <div class="flex items-center">
                                        <x-user-avatar :user="$post->user" />
                                        <h1 class="text-gray-700 font-bold">
                                            {{ $post->user->name }}
                                        </h1>
                                        <span class="ml-3 font-light text-gray-600">
                                                {{ $post->created_at }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <livewire:post.comment-section :post="$post" />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
