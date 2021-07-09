@php
    $active = request()->routeIs($link);
@endphp

<ul class="mt-1 hover:bg-gray-100 transition delay-75">
    <li class="relative px-6 py-3">
        @if ($active)
            <span class="absolute inset-y-0 right-0 w-1 bg-blue-500 rounded-tl-lg rounded-bl-lg" aria-hidden="true"></span>
        @endif
        <a
            class="inline-flex items-center w-full text-sm text-gray-600 transition-colors duration-150 select-none dark:hover:text-gray-200 dark:text-gray-100 @if ($active) text-blue-500  @endif"
            href="{{ route($link) }}"
        >
            {{ $icon }}
            <span class="ml-4">{{ $value }}</span>
        </a>
    </li>
</ul>
