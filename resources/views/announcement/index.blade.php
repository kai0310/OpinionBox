<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ __('お知らせ') }}
        </h2>
    </x-slot>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-10 mx-auto flex flex-wrap">
            <div class="md:pr-10 md:py-6 mx-auto max-w-2xl">
                @forelse($announcements as $announcement)
                    <x-annoucement-list-card
                        :announcement="$announcement"
                        :isLast="$loop->last"
                    />
                @empty
                    {{ __('お知らせはありません') }}
                @endforelse
            </div>
        </div>
    </section>
</x-app-layout>
