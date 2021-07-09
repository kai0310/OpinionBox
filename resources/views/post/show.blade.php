<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            <div class="flex items-center">
                <div class="flex items-center">
                    <a href="{{ route('post.index') }}">
                        Box<i class="fas fa-angle-right mx-3 hidden md:inline-block"></i>
                    </a>
                    <p class="hidden md:inline-block max-w-xs truncate align-middle">
                        {{ $post->title }}
                    </p>
                </div>
                @livewire('stuff.permit-button', ['post' => $post])
            </div>
        </h2>
    </x-slot>

    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="flex justify-between container mx-auto">
                <div class="w-full">
                    @if (session()->has('message'))
                        <div class="relative flex flex-col sm:flex-row sm:items-center bg-white shadow rounded-md py-5 pl-6 pr-8 sm:pr-6 mb-5">
                            <div class="flex flex-row items-center border-b sm:border-b-0 w-full sm:w-auto pb-4 sm:pb-0">
                                <div class="text-green-500">
                                    <svg class="w-6 sm:w-5 h-6 sm:h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                </div>
                                <div class="text-base ml-3">Awesome 👍</div>
                            </div>
                            <div class="text-sm tracking-wide text-gray-500 mt-4 sm:mt-0 sm:ml-4">
                                {{ session('message') }}
                            </div>
                        </div>
                    @endif

                    <div class="px-4 sm:px-0">
                        @if ( $post->created_at->diff(now())->m > 0 )
                            <div class="flex bg-yellow-50 max-12 mb-4">
                                <div class="w-auto text-grey-darker items-center p-4">
                                    <p class="leading-tight">
                                        この意見は1ヶ月以上前に投稿されています
                                    </p>
                                </div>
                            </div>
                        @endif
                        <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                            {{ $post->title }}
                        </h1>
                        <p class="mt-2 text-gray-600">
                            現在選択中のOpinionBoxに入った意見を表示しています。
                        </p>
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
                                        @livewire('post.like-button', ['post' => $post])
                                        <x-user-avatar :user="$post->user" />
                                        <span class="ml-3 font-light text-gray-600">
                                            {{ $post->created }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @livewire('post.comment-section', ['post' => $post])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
