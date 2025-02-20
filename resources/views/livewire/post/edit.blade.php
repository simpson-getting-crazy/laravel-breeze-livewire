<div>
    <form wire:submit="updatePost" class="mt-6 space-y-6">
        <div>
            <x-input-label for="title" :value="__('Title')" />
            <x-text-input
                wire:model.live.debounce.300ms="title"
                id="title"
                name="title"
                type="text"
                class="mt-1 block w-full"
                autocomplete="title"
                value="{{ old('title', $post->title) }}" />
            <x-input-error :messages="$errors->get('title')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="slug" :value="__('Slug')" />
            <x-text-input
                wire:model="slug"
                id="slug"
                name="slug"
                type="text"
                class="mt-1 block w-full"
                autocomplete="slug"
                value="{{ old('slug', $post->title) }}"
                readonly />
            <x-input-error :messages="$errors->get('slug')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="content" :value="__('Content')" />
            <x-textarea-input
                wire:model="content"
                id="content"
                name="content"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('content', $post->content) }}"
                autocomplete="content" />
            <x-input-error :messages="$errors->get('content')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-danger-button :href="route('post.index')" wire:navigate>{{ __('Cancel') }}</x-danger-button>
            <x-primary-button>{{ __('Update') }}</x-primary-button>

            <x-action-message class="me-3" on="post-created">
                {{ __('Updated.') }}
            </x-action-message>
        </div>
    </form>
</div>
