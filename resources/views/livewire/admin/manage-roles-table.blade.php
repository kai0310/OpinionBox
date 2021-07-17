<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto">
            <div class="my-2 align-middle inline-block min-w-full sm:px-6">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                ID
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Name
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Detail
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($roles as $role)
                            <tr>
                                <td class="px-6 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $role->id }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $role->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $role->detail ?? 'No detail' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                    @livewire('admin.edit-role-form', ['role' => $role ], key('edit-btn'.$role->id))
                                    <span class="mx-2">
                                        @livewire('admin.delete-role-button', ['role' => $role ], key('del-btn'.$role->id))
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-5">
                    @livewire('admin.create-roles-form')
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10">
        {{ $roles->links() }}
    </div>
</div>
