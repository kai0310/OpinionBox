@if ($post->authorIs(auth()->user()))
    <x-jet-danger-button wire:click="confirmation" class="ml-2">
        {{ __('削除する') }}
    </x-jet-danger-button>
@endif
