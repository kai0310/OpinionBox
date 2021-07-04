<x-jet-form-section submit="updateBio">
    <x-slot name="title">
        {{ __('Your bio') }}
    </x-slot>

    <x-slot name="description">
        自身のことを、他のユーザに分かってもらうように、自己紹介しましょう。
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bio" value="{{ __('Your bio') }}" />
            <textarea
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                rows="3"
                id="bio"
                wire:model="bio"
            >Auth::user()->bio</textarea>
            <x-jet-input-error for="bio" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button>
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
