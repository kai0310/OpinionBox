<div class="flex-1 p:2 sm:p-6 justify-between flex flex-col mt-10">
    <div wire:poll.5s id="messages" class="flex flex-col space-y-4 p-3">
        @forelse($post->comments as $comment)
            @if ( $comment->user->id === Auth::id() )
                <div class="chat-message my-1">
                    <div class="flex items-end justify-end">
                        <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-1 items-end">
                            <div class="max-w-md">
                                <span
                                    class="px-4 py-2 rounded-lg inline-block rounded-br-none bg-blue-600 text-white select-none">
                                    {{ $comment->body }}
                                </span>
                            </div>
                        </div>
                        <img
                            src="{{ $comment->user->profile_photo_url }}"
                            alt="{{ $comment->user->name }}さんのプロフィール画像"
                            class="w-8 h-8 rounded-full order-1"
                        />
                    </div>
                </div>
            @else
                <div class="chat-message my-1">
                    <div class="flex items-end">
                        <div class="flex flex-col space-y-2 text-sm max-w-xs mx-2 order-2 items-start">
                            <div class="max-w-xs">
                                <p class="px-4 py-2 rounded-lg inline-block rounded-bl-none bg-gray-300 text-gray-600 select-none">
                                    {{ $comment->body }}
                                </p>
                            </div>
                        </div>
                        <a href="{{ route('user.show', [$comment->user]) }}"
                           class="block pointer select-none">
                            <img
                                src="{{ $comment->user->profile_photo_url }}"
                                alt="{{ $comment->user->name }}さんのプロフィール画像"
                                class="w-8 h-8 rounded-full order-1"
                            />
                        </a>
                    </div>
                </div>
            @endif
        @empty
            <div class="my-6">
                <div class="mx-auto max-w-4xl px-10 py-6 text-center bg-white rounded-lg shadow-md">
                    <h1 class="text-gray-700 font-bold cursor-pointer">まだコメントはありません</h1>
                </div>
            </div>
        @endforelse
    </div>

    @if (session()->has('message'))
        <div class="text-blue-500">
            <i class="fas fa-check-circle mx-1"></i>{{ session('message') }}
        </div>
    @endif


    @if ($errors->any())
        @foreach($errors->all() as $error)
            <div class="text-red-500">
                {{ $error }}
            </div>
        @endforeach
    @endif

    <form wire:submit.prevent="submit">
        @csrf
        <div class="border-t-2 border-gray-200 px-4 pt-4 mb-2 sm:mb-0">
            <div class="relative flex">
                <input type="text"
                       wire:model="body"
                       placeholder="Enterで送信"
                       class="w-full focus:outline-none focus:placeholder-gray-400 text-gray-600 placeholder-gray-600 pl-12 bg-gray-200 rounded-full py-3 border-transparent"
                >


                <div class="absolute right-0 items-center inset-y-0 hidden sm:flex">
                    <button
                        type="submit"
                        class="inline-flex items-center justify-center rounded-full h-12 w-12 transition duration-500 ease-in-out text-white bg-blue-500 hover:bg-blue-400 focus:outline-none"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                             class="h-6 w-6 transform rotate-90">
                            <path
                                d="M10.894 2.553a1 1 0 00-1.788 0l-7 14a1 1 0 001.169 1.409l5-1.429A1 1 0 009 15.571V11a1 1 0 112 0v4.571a1 1 0 00.725.962l5 1.428a1 1 0 001.17-1.408l-7-14z"></path>
                        </svg>
                    </button>
                    <x-jet-action-message class="ml-3" on="saved">
                        投稿に成功しました
                    </x-jet-action-message>
                </div>
            </div>
        </div>
    </form>
</div>
