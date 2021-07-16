<div>
    <div class="text-right">
        <x-jet-button wire:click="$set('formModal', true)" wire:loading.attr="disabled">
            新規作成
        </x-jet-button>
    </div>

    <x-jet-dialog-modal wire:model="formModal">
            <x-slot name="title">
                新規ロール作成
            </x-slot>
            <x-slot name="content">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="roleName" value="{{ __('Role Name') }}"/>
                    <x-jet-input id="roleName" type="text" class="mt-1 block w-full" wire:model="name" />
                    <x-jet-input-error for="roleName" class="mt-2"/>
                </div>

                <div class="col-span-6 sm:col-span-4 mt-3">
                    <x-jet-label for="roleDetail" value="{{ __('Detail of Role') }}"/>
                    <textarea
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        rows="3"
                        wire:model="detail"
                        id="roleDetail"
                    ></textarea>
                    <x-jet-input-error for="roleDetail" class="mt-2"/>
                </div>

            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$set('formModal', false)" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-jet-secondary-button>

                <x-jet-button wire:click="create" wire:loading.attr="disabled">
                    {{ __('作成') }}
                </x-jet-button>
            </x-slot>
    </x-jet-dialog-modal>
</div>
