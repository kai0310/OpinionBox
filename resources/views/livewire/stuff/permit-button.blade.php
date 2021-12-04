<div class="ml-auto text-sm flex items-center gap-x-6">
    @if ($post->isApproved())
        <div>
            <i class="far fa-eye mx-2"></i>
            {{ __('公開中') }}
        </div>

        <div class="flex items-center">
            @can('stuff')
                <x-jet-button wire:click="undoApprove" wire:loading.attr="disabled">
                    {{ __('非公開にする') }}
                </x-jet-button>
            @endcan
            <div wire:loading.delay>
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                {{ __('更新中です') }}
            </div>
        </div>
    @else
        @can('stuff')
            <div class="flex items-center">
                <x-jet-button wire:click="approve" wire:loading.attr="disabled">
                    {{ __('公開する') }}
                </x-jet-button>
                <div wire:loading.delay>
                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    {{ __('更新中です') }}
                </div>
            </div>
        @else
            <i class="far fa-eye-slash mx-2"></i>
            {{ __('非公開中') }}
        @endcan
    @endif
</div>
