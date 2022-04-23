<div>
    <span wire:click="$set('userEditModal', true)"
          class="text-indigo-600 hover:text-indigo-900 select-none cursor-pointer">
        {{ __('編集する') }}
    </span>

    <x-modal.card :title="__(':0 さんの情報', [$targetUser->name])" blur wire:model.defer="userEditModal">
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
            <x-input :label="__('Name')" :placeholder="__('フルネーム')" :value="$targetUser->name"/>

            @if ($targetUser->student_number)
                <x-input :label="__('学籍番号')" :value="$targetUser->student_number"/>
            @endif

            <div class="col-span-1 sm:col-span-2">
                <x-input :label="__('Name')" :value="$targetUser->email"/>
            </div>

            <div class="flex gap-x-2">
                @unless (auth()->user()->is($targetUser))
                    <x-button
                        wire:click="resetPassword"
                        class="py-2"
                        outline negative
                        :label="__('パスワードを初期化する')"
                    />

                    <x-button
                        wire:click="banUser"
                        negative
                        label="{{ $targetUser->isBanned() ? 'Banを解除する' : 'Banする' }}"
                    />
                @endunless
            </div>
        </div>

        <x-slot name="footer">
            <div class="flex justify-between gap-x-4">
                <x-button
                    wire:click="$set('userEditModal', false)"
                    flat :label="__('キャンセル')"
                />
                <x-button
                    wire:click="save"
                    primary :label="__('保存')"
                />
            </div>
        </x-slot>
    </x-modal.card>
</div>
