<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            <a href="{{ route('post.index') }}">
                Box
            </a>
            <i class="fas fa-angle-right mx-3"></i>
            {{ __('未承認の意見') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="px-4 sm:px-0">
            <h1 class="text-xl font-bold text-gray-700 md:text-2xl">
                {{ __('未承認の意見') }}
            </h1>
            <p class="mt-2 text-gray-600">
                {{ __('未承認で非公開中の全ての意見を表示しています。') }}
            </p>
        </div>
        @forelse($posts as $post)
            <div class="mt-6">
                <x-article-list-item :post="$post" />
            </div>
        @empty
            <div class="mt-6">
                <div class="mx-auto max-w-4xl px-10 py-6 text-center bg-white rounded-lg shadow-md">
                    <h1 class="text-gray-700 font-bold">
                        {{ __('未承認の意見はありません') }}
                    </h1>
                </div>
            </div>
        @endforelse
        <div class="mx-auto max-w-4xl">
            {{ $posts->links() }}
        </div>
    </div>
</x-app-layout>
