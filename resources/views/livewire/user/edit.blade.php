<div>
    <form wire:submit="updateUser" class="mt-6 space-y-6">
        <div>
            <x-input-label for="name" :value="__('Full Name')" />
            <x-text-input
                wire:model="name"
                id="name"
                name="name"
                type="text"
                class="mt-1 block w-full"
                value="{{ old('name', $user->name) }}"
                autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="email" :value="__('Email Address')" />
            <x-text-input
                wire:model="email"
                id="email"
                name="email"
                type="email"
                class="mt-1 block w-full"
                value="{{ old('email', $user->email) }}"
                autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="password" :value="__('Change Password')" />
            <x-text-input wire:model="password" id="password" name="password" type="password" class="mt-1 block w-full" autocomplete="password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="confirm_password" :value="__('Confirm Password Changes')" />
            <x-text-input wire:model="confirm_password" id="confirm_password" name="confirm_password" type="password" class="mt-1 block w-full" autocomplete="confirm_password" />
            <x-input-error :messages="$errors->get('confirm_password')" class="mt-2" />
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
