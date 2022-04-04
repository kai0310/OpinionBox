@if ($post->authorIs(auth()->user()))
    <x-jet-danger-button wire:click="deletePost" class="ml-2">
        {{ __('削除する') }}
    </x-jet-danger-button>
@endif
