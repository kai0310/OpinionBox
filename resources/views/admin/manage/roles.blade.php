<x-admin-layout>
    <x-slot name="header">
        {{ __ ('ロール設定') }}
    </x-slot>

    @livewire('admin.manage-roles-table')
</x-admin-layout>
