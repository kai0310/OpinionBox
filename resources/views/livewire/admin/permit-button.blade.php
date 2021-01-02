<div class="ml-auto text-sm">
    @if ( $post->is_checked )
        <i class="far fa-eye mx-2"></i>公開中
    @else
        @can('admin')
            <div class="flex items-center">
                <x-jet-button wire:click="submit" wire:loading.attr="disabled">
                    公開する
                </x-jet-button>
                <x-jet-action-message class="ml-3" on="saved">
                    公開されました
                </x-jet-action-message>
            </div>
        @else
            <i class="far fa-eye-slash mx-2"></i>非公開中
        @endcan
    @endif
</div>
