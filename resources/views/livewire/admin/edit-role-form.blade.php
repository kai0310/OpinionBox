<div class="inline">
    <x-jet-button wire:click="$set('formModal', true)" wire:loading.attr="disabled">
        Edit
    </x-jet-button>

    <div class="text-left">
        <x-jet-dialog-modal wire:model="formModal">
            <x-slot name="title">
                ロール編集
            </x-slot>
            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="roleName" value="{{ __('Role Name') }}"/>
                    <x-jet-input id="roleName" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
                    <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name" />
                    <x-jet-input-error for="roleName" class="mt-2"/>
                </div>
                {{ $state['name'] }}

                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="roleDetail" value="{{ __('Detail of Role') }}"/>
                    <textarea
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3"
                        wire:model="detail"
                        id="roleDetail"
                    >{{ $role->detail }}</textarea>
                    <x-jet-input-error for="roleDetail" class="mt-2"/>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('formModal', false)" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-jet-secondary-button>

                <x-jet-button wire:click="update" wire:loading.attr="disabled">
                    {{ __('update') }}
                </x-jet-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
