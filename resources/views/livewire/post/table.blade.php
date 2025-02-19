<div>
    <table class="min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <div class="flex items-center space-x-1 cursor-pointer group" data-sort="name">
                        <span>Title</span>
                        <x-heroicon-s-chevron-up-down
                            class="h-4 w-4 text-gray-400 group-hover:text-gray-500" />
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <div class="flex items-center space-x-1 cursor-pointer group" data-sort="email">
                        <span>Slug</span>
                        <x-heroicon-s-chevron-up-down
                            class="h-4 w-4 text-gray-400 group-hover:text-gray-500" />
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <div class="flex items-center space-x-1 cursor-pointer group" data-sort="role">
                        <span>Content Summary</span>
                        <x-heroicon-s-chevron-up-down
                            class="h-4 w-4 text-gray-400 group-hover:text-gray-500" />
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                    <div class="flex items-center space-x-1 cursor-pointer group" data-sort="created_at">
                        <span>Author</span>
                        <x-heroicon-s-chevron-up-down
                            class="h-4 w-4 text-gray-400 group-hover:text-gray-500" />
                    </div>
                </th>
                <th scope="col"
                    class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Action
                </th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @forelse ($posts as $post)
                <tr class="hover:bg-gray-50" wire:key="{{ $post->id}}">
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $post->title }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <div class="text-sm text-gray-900">{{ $post->slug }}</div>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-purple-100 text-purple-800">
                            {{ $post->content }}
                        </span>
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                        {{ $post->created_by }}
                    </td>
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="" class="text-blue-600 hover:text-blue-900" title="Edit">
                                <x-heroicon-o-pencil-square class="h-5 w-5" />
                            </a>
                            <button type="button" class="text-red-600 hover:text-red-900" title="Delete">
                                <x-heroicon-o-trash class="h-5 w-5" />
                            </button>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="px-6 py-10 whitespace-nowrap text-sm text-gray-500 text-center">
                        <div class="flex flex-col items-center justify-center">
                            <x-heroicon-o-face-frown class="h-10 w-10 text-gray-400" />
                            <span class="mt-2 font-medium">No posts found</span>
                            <p class="mt-1 text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
