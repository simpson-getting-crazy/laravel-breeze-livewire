<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Post') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="bg-white rounded-lg shadow-md overflow-hidden p-6">
            <section>
                <header>
                    <h2 class="text-lg font-medium text-gray-900">
                        {{ __('Create Post') }}
                    </h2>

                    <p class="mt-1 text-sm text-gray-600">
                        {{ __('Fill up the form below to create a new post') }}
                    </p>
                </header>

                <livewire:post.create />
            </section>
        </div>
    </div>

</x-app-layout>
