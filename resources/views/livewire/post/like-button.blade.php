<div class="cursor-pointer select-none text-base">
    @if ( $like )
        <button wire:click="cancel" class="text-blue-700">
            <i class="far fa-thumbs-up mx-2"></i>{{ $counts }}
        </button>
    @else
        <button wire:click="like">
            <i class="far fa-thumbs-up mx-2"></i>{{ $counts  }}
        </button>
    @endif
</div>
