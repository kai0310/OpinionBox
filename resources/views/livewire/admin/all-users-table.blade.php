<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto">
            <div class="my-2 align-middle inline-block min-w-full sm:px-6">
                <x-jet-input
                    wire:model="search"
                    class="w-96 mb-5 ml-auto"
                    type="text"
                    placeholder="学籍番号または氏名から検索"
                />
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
                                学籍番号
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Role
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                管理者
                            </th>
                            <th scope="col" class="relative px-6 py-3">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($users as $user)
                            <tr>
                                <td class="px-6 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $user->id }}
                                    </div>
                                </td>
                                <td class="py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">
                                                {{ $user->name }}
                                                @if ($user->isBanned())
                                                    <span class="text-red-500">
                                                        {{ __('banned') }}
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="text-sm text-gray-500">
                                                {{ $user->email }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if ($user->student_number)
                                        <span class="text-sm text-gray-900">
                                            {{ $user->student_number  }}
                                        </span>
                                    @else
                                        <span class="text-sm text-gray-600">
                                            NaN
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">

                                    @forelse($user->role_list as $role)
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800 uppercase">
                                            {{ $role }}
                                        </span>
                                    @empty
                                        None
                                    @endforelse
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $user->is_admin ? 'はい' : 'いいえ' }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    @livewire('admin.user-edit-modal', ['targetUser' => $user], key($user->id))
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="mt-10">
        {{ $users->links() }}
    </div>
</div>
