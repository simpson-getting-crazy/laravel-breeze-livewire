<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <!-- data-table.blade.php -->
        <livewire:post.table />
    </div>
</x-app-layout>
