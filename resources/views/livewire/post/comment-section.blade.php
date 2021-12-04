<div>
    <div wire:poll.5s class="mt-5">
        @forelse($post->comments as $comment)
            <div class="bg-white shadow rounded mt-2">
                <div class="border-b">
                    <div class="px-6 py-2 lg:py-4">
                        <div class="flex flex-row justify-between items-start lg:items-center">
                            <div>
                                <a href="{{ route('user.show', $comment->user) }}"
                                   class="flex items-center hover:underline"
                                >
                                    <img
                                        src="{{ $comment->user->profile_photo_url }}"
                                        alt="{{ $comment->user->name }}"
                                        class="rounded-full text-gray-500 w-6 h-6 rounded-full mr-3"
                                    >
                                    <span class="text-gray-900 mr-5">
                                        {{ $comment->user->name }}
                                    </span>
                                </a>
                            </div>

                            <div class="flex items-center gap-x-2">
                                {{ $comment->created_at->diffForHumans() }}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="prose max-w-none p-6 break-words">
                    {!! $comment->body !!}
                </div>
            </div>
        @empty
            No comment...
        @endforelse
    </div>

    <form wire:submit.prevent="submit" class="mt-8 mx-5 md:mx-0">
        <textarea
            wire:model="body"
            class="bg-gray-50 focus:bg-white mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            rows="3"
            name="body"
            id="body"
            required
            placeholder="{{ __('返信を投稿する') }}"
        ></textarea>

        <div class="flex justify-end gap-x-2 mt-5">
            <x-jet-button>
                {{ __('投稿') }}
            </x-jet-button>
        </div>
    </form>

</div>
