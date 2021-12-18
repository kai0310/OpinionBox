<div class="cursor-pointer select-none text-base">
        <button
            wire:click="@if($like) cancel @else like @endif"
            @class(['text-active' => $like, 'text-disable' => !$like])
        >
            <i class="far fa-thumbs-up mx-1"></i>{{ $counts }}
        </button>
</div>
