<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            <a href="{{ route('post.index') }}">Box<i class="fas fa-angle-right mx-3"></i></a> {{ $post->title }}
        </h2>
    </x-slot>

    <div>
        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="flex justify-between container mx-auto">
                    <div class="w-full">
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">公開中の意見</h1>
                        <p class="mt-2 text-gray-600">公開されているBoxの中に入った意見をランダムに表示しています。</p>
                        <div class="flex bg-green-100 max-12 my-4">
                            <div class="hidden md:block w-16 bg-green-500">
                                <div class="p-4 text-center"><i class="far fa-lightbulb text-white text-4xl"></i></div>
                            </div>
                            <div class="w-auto text-grey-darker items-center p-4">
                                <span class="text-lg font-bold pb-4">コメントをしてみよう！</span>
                                <p class="leading-tight">共感した投稿や何か提案がある投稿にはコメントをしてみましょう</p>
                            </div>
                        </div>
                        <div class="flex flex-col mt-3">
                            <div class="mt-6">
                                <div class="px-10 py-6 bg-white rounded-lg shadow-md">
                                    <div class="mt-2">
                                        <h3 class="text-2xl text-gray-700 font-bold">{{ $post->title }}</h3>
                                        <p class="mt-2 text-gray-600 max-h-24 break-words">
                                            {{ $post->content }}
                                        </p>
                                    </div>
                                    <div class="flex justify-end items-center mt-4">
                                        <div class="flex items-center">
                                            <img src="{{ $post->user->profile_photo_url }}"
                                                 alt="{{ $post->user->name }}さんのプロフィール画像"
                                                 class="mx-4 w-10 h-10 object-cover rounded-full hidden sm:block "
                                            />
                                            <h1 class="text-gray-700 font-bold">{{ $post->user->name }}</h1>
                                            <span class="ml-3 font-light text-gray-600">{{ $post->created_at }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <livewire:post.show-post :post="$post" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
