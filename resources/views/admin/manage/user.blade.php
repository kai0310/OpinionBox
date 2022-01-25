<x-admin-layout>
    <x-slot name="header">
        {{ __ ('ユーザ情報管理') }}
    </x-slot>

    @livewire('admin.all-users-table')
</x-admin-layout>
