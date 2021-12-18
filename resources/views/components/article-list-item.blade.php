<article>
    <div class="mx-auto max-w-4xl px-10 py-6 bg-white rounded-lg shadow-md">
        <div class="mt-2">
            <a href="{{ route('post.show', $post) }}" class="text-2xl text-gray-700 font-bold hover:underline">
                {{ $post->title }}
            </a>
            <p class="mt-2 text-gray-600 max-h-24 truncate">
                {{ $post->content }}
            </p>
        </div>
        <div class="flex justify-end items-center mt-4">
            <div class="flex items-center">
                @if ($post->comments_count)
                    <span class="mx-2 text-disable">
                        <i class="fas fa-comments "></i>
                        {{ $post->comments_count }}
                    </span>
                @endif

                <span class="mx-2 md:mx-0">
                    @livewire('post.like-button', ['post' => $post])
                </span>

                <x-user-avatar :user="$post->user"/>

                <span class=" font-light text-sub">
                    {{ $post->created }}
                </span>
            </div>
        </div>
    </div>
</article>
