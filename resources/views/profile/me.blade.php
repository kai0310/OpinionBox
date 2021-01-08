<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl text-gray-800 leading-tight">
            {{ $user->name }}さんのプロフィール
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="bg-white my-12 pb-6 w-full justify-center items-center overflow-hidden md:max-w-sm rounded-lg shadow-sm mx-auto">
            <div class="block relative h-40 bg-gray-400"></div>
            <div class="relative shadow mx-auto h-24 w-24 -my-12 border-white rounded-full overflow-hidden border-4">
                <img class="object-cover w-full h-full" src="{{ $user->profile_photo_url }}">
            </div>
            <div class="mt-16">
                <h1 class="text-lg text-center font-semibold">
                    {{ $user->name }}
                </h1>
                <p class="text-sm text-gray-600 text-center">
                    {{ $user->contributions }} contributions
                </p>
            </div>
            <div class="mt-6 pt-3 flex flex-wrap mx-6 border-t">
                @if ( $user->is_admin )
                    <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                        Administrator
                    </div>
                @endif
                @if ( $user->is_developer )
                    <div class="text-xs mr-2 my-1 uppercase tracking-wider border px-2 text-indigo-600 border-indigo-600 hover:bg-indigo-600 hover:text-indigo-100 cursor-default">
                        Developer
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
