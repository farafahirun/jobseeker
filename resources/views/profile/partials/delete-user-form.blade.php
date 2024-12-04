<section class="space-y-6 bg-white p-6 rounded-lg shadow-sm border border-gray-100">
    <header>
        <h2 class="text-2xl font-bold text-gray-800 flex items-center">
            <svg class="w-6 h-6 mr-2 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
            </svg>
            {{ __('Delete Account') }}
        </h2>

        <p class="mt-3 text-gray-600 bg-yellow-50 p-4 rounded-lg border border-yellow-100">
            <span class="font-medium text-yellow-800">Warning:</span> {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
        </p>
    </header>

    <x-danger-button
        x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')"
        class="bg-red-500 hover:bg-red-600 transition-colors duration-200 py-3 px-6 rounded-lg text-white font-semibold flex items-center"
    >
        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
        {{ __('Delete Account') }}
    </x-danger-button>

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-8 bg-white rounded-xl">
            @csrf
            @method('delete')

            <h2 class="text-xl font-bold text-gray-800 mb-4">
                {{ __('Are you sure you want to delete your account?') }}
            </h2>

            <p class="text-gray-600 bg-red-50 p-4 rounded-lg border border-red-100 mb-6">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            <div class="mb-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="w-full px-4 py-3 rounded-lg border border-gray-300 focus:border-red-500 focus:ring focus:ring-red-200"
                    placeholder="{{ __('Enter your password to confirm') }}"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2 text-red-500" />
            </div>

            <div class="flex justify-end space-x-4">
                <x-secondary-button x-on:click="$dispatch('close')" class="px-6 py-3 bg-gray-100 hover:bg-gray-200 transition-colors duration-200 rounded-lg text-gray-700">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-danger-button class="px-6 py-3 bg-red-500 hover:bg-red-600 transition-colors duration-200 rounded-lg">
                    {{ __('Confirm Delete') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>
