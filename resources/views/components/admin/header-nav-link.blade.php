@php
    $active = request()->routeIs($link);
@endphp

<ul class="mt-1 hover:bg-gray-100 transition delay-75">
    <li class="relative px-8 py-3">
        <a
            @class([
                'inline-flex items-center w-full text-sm transition-colors duration-150 select-none',
                'text-blue-500' => $active,
                'text-gray-600' => ! $active,
            ])
            href="{{ route($link) }}"
        >
            {{ $icon }}
            <span class="ml-4">{{ $value }}</span>
        </a>
        @if ($active)
            <span class="absolute inset-y-0 right-0 w-1 bg-blue-500 rounded-tl-lg rounded-bl-lg" aria-hidden="true"></span>
        @endif
    </li>
</ul>
