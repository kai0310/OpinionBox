<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            <a
                href="{{ route('post.index') }}"
                class="hover:underline"
            >Box
            </a>
            <i class="fas fa-angle-right mx-3"></i>
            {{ __('新規作成') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        @livewire('post.create')
    </div>
</x-app-layout>
