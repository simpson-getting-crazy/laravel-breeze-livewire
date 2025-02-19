<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <!-- data-table.blade.php -->
        <div class="bg-white rounded-lg shadow-md overflow-hidden">
            <!-- Table Header with Actions -->
            <div class="p-4 border-b border-gray-200 bg-gray-50 sm:flex sm:items-center sm:justify-between">
                <div class="flex items-center space-x-4">
                    <h2 class="text-lg font-medium text-gray-800">Post</h2>
                    <span class="px-3 py-1 text-xs text-gray-600 bg-gray-200 rounded-full">
                        {{ $countPosts }} entries</span>
                </div>

                <div class="mt-4 sm:mt-0 flex flex-col sm:flex-row sm:space-x-3 space-y-3 sm:space-y-0">
                    <!-- Search Input -->
                    <div class="relative flex-grow">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <x-heroicon-o-magnifying-glass class="h-5 w-5 text-gray-400" />
                        </div>
                        <input type="text" name="search"
                            class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-md leading-5 bg-white placeholder-gray-500 focus:outline-none focus:ring-1 focus:ring-red-500 focus:border-red-500 sm:text-sm"
                            placeholder="Search post..." value="{{ request('search') }}">
                    </div>

                    <!-- Add Button -->
                    <a href="{{ route('post.create') }}"
                        class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500"
                        wire:navigate>
                        <x-heroicon-s-plus class="h-4 w-4 mr-2" />
                        Add User
                    </a>
                </div>
            </div>

            <!-- Table Filters and Sorting -->
            <div class="p-4 border-b border-gray-200 bg-white sm:flex sm:items-center">
                <div class="mt-4 sm:mt-0 sm:ml-4">
                    <div class="flex space-x-4">
                        <div>
                            <label for="status" class="text-sm font-medium text-gray-700">Sort by:</label>
                            <select id="sort" name="sort"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                                <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name (A-Z)
                                </option>
                                <option value="name_desc" {{ request('sort') == 'name_desc' ? 'selected' : '' }}>Name (Z-A)
                                </option>
                                <option value="created_at_desc" {{ request('sort') == 'created_at_desc' ? 'selected' : '' }}>
                                    Newest</option>
                                <option value="created_at_asc" {{ request('sort') == 'created_at_asc' ? 'selected' : '' }}>
                                    Oldest</option>
                            </select>
                        </div>

                        <div>
                            <label for="status" class="text-sm font-medium text-gray-700">Status:</label>
                            <select id="status" name="status"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                                <option value="">All</option>
                                <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Active
                                </option>
                                <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>
                                    Inactive</option>
                            </select>
                        </div>

                        <div>
                            <label for="role" class="text-sm font-medium text-gray-700">Role:</label>
                            <select id="role" name="role"
                                class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-red-500 focus:border-red-500 sm:text-sm rounded-md">
                                <option value="">All</option>
                                <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin
                                </option>
                                <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <livewire:post.table />
            </div>
        </div>
    </div>
</x-app-layout>
