<div class="flex relative pb-12">
    <div class="h-full w-10 absolute inset-0 flex items-center justify-center">
        @if ( ! $isLast )
            <div class="h-full w-1 bg-gray-200 pointer-events-none"></div>
        @endif
    </div>
    <div
        class="flex-shrink-0 w-10 h-10 rounded-full bg-blue-500 inline-flex items-center justify-center text-white relative z-10"
    >
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 3a1 1 0 00-1.447-.894L8.763 6H5a3 3 0 000 6h.28l1.771 5.316A1 1 0 008 18h1a1 1 0 001-1v-4.382l6.553 3.276A1 1 0 0018 15V3z" clip-rule="evenodd"></path>
        </svg>
    </div>
    <div class="flex-grow pl-4">
        <div class="flex items-center">
            <h2 class="font-medium title-font text-lg text-gray-900 tracking-wider">
                {{ $announcement->title }}
            </h2>
            <span class="mx-3 self-center text-sm">
                {{ $announcement->date }} {{ $announcement->status }}
            </span>
        </div>
        <div class="max-w-96">
            <div class="break-words">
                <x-markdown :text="$announcement->description" />
            </div>
        </div>
    </div>
</div>
