<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4">
            <div class="p-6 text-gray-900">
                <x-stats-card
                    title="Total Users"
                    value="{{ $countUsers }}"
                >
                    <x-heroicon-s-user-group class="w-6 h-6 text-red-500" />
                </x-stats-card>
            </div>
            <div class="p-6 text-gray-900">
                <x-stats-card
                    title="Total Posts"
                    value="{{ $countPosts }}"
                >
                    <x-heroicon-o-newspaper class="w-6 h-6 text-red-500" />
                </x-stats-card>
            </div>
        </div>
    </div>
</x-app-layout>
