<div>
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Table Header with Actions -->
        <div class="p-4 border-b border-gray-200 bg-gray-50 sm:flex sm:items-center sm:justify-between">
            <div class="flex items-center space-x-4">
                <h2 class="text-lg font-medium text-gray-800">Post</h2>
            </div>

            <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row sm:space-x-3 space-y-3 sm:space-y-0">
                <!-- Search Input -->
                <div class="relative flex-grow">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <x-heroicon-o-magnifying-glass class="h-5 w-5 text-gray-400" />
                    </div>
                    <input
                        type="text"
                        name="search"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 sm:text-sm"
                        placeholder="Search post..." value="{{ request('search') }}"
                        wire:model.live.debounce.300ms="search">
                </div>

                <!-- Add Button -->
                <a href="{{ route('post.create') }}"
                    class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                    wire:navigate>
                    <x-heroicon-s-plus class="h-4 w-4 mr-2" />
                    Add Post
                </a>
            </div>
        </div>

        <!-- Table Filters and Sorting -->
        <div class="p-4 border-b border-gray-200 bg-white sm:flex sm:items-center">
            <div class="mt-4 sm:mt-0 sm:ml-4">
                <div class="flex space-x-4">
                    <div>
                        <label for="status" class="text-sm font-medium text-gray-700">Sort by:</label>
                        <select
                            id="sort"
                            name="sort"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                            wire:model.live="sort">
                            @foreach(['asc', 'desc'] as $sort)
                                <option value="{{ $sort }}">
                                    {{ ucfirst($sort) . 'ending' }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="status" class="text-sm font-medium text-gray-700">Per Page:</label>
                        <select
                            id="status"
                            name="status"
                            class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md"
                            wire:model.live="perPage">
                            @foreach ([5, 10, 25, 50] as $perPage)
                                <option value="{{ $perPage }}">
                                    {{ $perPage }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <!-- Table -->
        <div class="overflow-x-auto">
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
                                    <a href="{{ route('post.edit', $post->id) }}" class="text-blue-600 hover:text-blue-900" title="Edit" wire:navigate>
                                        <x-heroicon-o-pencil-square class="h-5 w-5" />
                                    </a>
                                    <button type="button" wire:click.prevent="deleteConfirmation({{ $post->id }})" class="text-red-600 hover:text-red-900" title="Delete">
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
        <div class="px-4 py-3 bg-gray-50 border-t border-gray-200 sm:px-6">
            {{ $posts->links('vendor.pagination') }}
        </div>
    </div>
</div>
