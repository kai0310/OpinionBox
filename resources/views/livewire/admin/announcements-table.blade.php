<div>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto">
            <div class="my-2 align-middle inline-block min-w-full sm:px-6">
                @if($announcements->count())
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
                                    タイトル
                                </th>
                                <th scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    本文
                                </th>
                                <th scope="col" class="relative px-6 py-3">
                                    <span class="sr-only">Edit</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach($announcements as $announcement)
                                <tr>
                                    <td class="px-6 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $announcement->id }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            {{ $announcement->title }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900 max-w-xs lg:max-w-2xl overflow-hidden">
                                            {!! $announcement->description ?? 'No detail' !!}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium flex">
                                        @livewire('admin.edit-announcement-button')

                                        @livewire('admin.delete-announcement-button')
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    No Announcement yet
                @endif
            </div>
        </div>
    </div>

    <div class="mt-10">
        {{ $announcements->links() }}
    </div>
</div>
