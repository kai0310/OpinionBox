<div>
    <span wire:click="$set('userEditModal', true)" class="text-indigo-600 hover:text-indigo-900 select-none cursor-pointer">
        {{ __('編集する') }}
    </span>

    <x-modal.card title="Edit Customer" blur wire:model.defer="userEditModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input label="Name" placeholder="Your full name" :value="$targetUser->name" />

            @if ($targetUser->student_number)
                <x-input label="Phone" :value="$targetUser->student_number" />
            @endif

            <div class="col-span-1 sm:col-span-2">
                <x-input label="Email" :value="$targetUser->email" />
            </div>

            <div class="flex gap-x-2">
                @unless (auth()->user()->is($targetUser))
                    <x-button
                        wire:click="resetPassword"
                        class="py-2"
                        outline negative
                        :label="__('パスワードを初期化する')"
                    />

                    <x-jet-danger-button
                        wire:click="banUser"
                        flat negative
                        label="Banする"
                    />
                @endunless
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <div class="flex">
                    <x-button flat label="キャンセル" x-on:click="banUse" />
                    <x-button primary label="保存" wire:click="save" />
                </div>
            </div>
        </x-slot>
    </x-modal.card>
</div>
