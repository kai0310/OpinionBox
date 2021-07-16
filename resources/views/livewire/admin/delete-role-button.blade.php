<div class="inline">
    <x-jet-danger-button wire:click="confirmingRoleDeletion" wire:loading.attr="disabled">
        {{ __('Delete') }}
    </x-jet-danger-button>

    <!-- Delete Role Confirmation Modal -->
    <div class="text-left whitespace-normal">
        <x-jet-dialog-modal wire:model="confirmingRoleDeletion">
            <x-slot name="title">
                {{ __('Delete Role') }}
            </x-slot>

            <x-slot name="content">
                ロールを削除してもよろしいですか？ロールが削除すると、ロールを持っていたユーザの権限も削除されます。
                また、削除されるとこの操作は取り消せません。
            </x-slot>

            <x-slot name="footer">
                <x-jet-secondary-button wire:click="$toggle('confirmingRoleDeletion')" wire:loading.attr="disabled">
                    {{ __('Nevermind') }}
                </x-jet-secondary-button>

                <x-jet-danger-button class="ml-2" wire:click="deleteRole" wire:loading.attr="disabled">
                    {{ __('Delete Role') }}
                </x-jet-danger-button>
            </x-slot>
        </x-jet-dialog-modal>
    </div>
</div>
