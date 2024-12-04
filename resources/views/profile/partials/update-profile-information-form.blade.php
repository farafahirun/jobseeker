<section class="bg-white p-6 rounded-lg shadow-sm border border-gray-100">
    <header class="flex items-center space-x-3 border-b border-gray-200 pb-5">
        <div class="p-2 bg-blue-50 rounded-lg">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
            </svg>
        </div>
        <div>
            <h2 class="text-xl font-bold text-gray-900">
                {{ __('Professional Profile') }}
            </h2>
            <p class="mt-1 text-sm text-gray-600">
                {{ __("Keep your profile information up to date to maximize your job seeking opportunities.") }}
            </p>
        </div>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="grid gap-6 md:grid-cols-2">
            <div class="space-y-2">
                <x-input-label for="username" :value="__('Professional Username')" class="font-medium" />
                <x-text-input 
                    id="username" 
                    name="username" 
                    type="text" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" 
                    :value="old('username', $user->username)" 
                    required 
                    autofocus 
                    autocomplete="username" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('username')" />
            </div>

            <div class="space-y-2">
                <x-input-label for="email" :value="__('Contact Email')" class="font-medium" />
                <x-text-input 
                    id="email" 
                    name="email" 
                    type="email" 
                    class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 transition-colors" 
                    :value="old('email', $user->email)" 
                    required 
                    autocomplete="username" 
                />
                <x-input-error class="mt-2" :messages="$errors->get('email')" />

                @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                    <div class="mt-2 p-4 bg-yellow-50 rounded-lg">
                        <p class="text-sm text-yellow-700">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="font-medium text-yellow-600 hover:text-yellow-500 underline">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 text-sm font-medium text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center gap-4 pt-4 mt-6 border-t border-gray-200">
            <x-primary-button class="px-6 py-2.5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500">
                {{ __('Update Profile') }}
            </x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 bg-green-50 px-4 py-2 rounded-lg"
                >{{ __('Profile updated successfully.') }}</p>
            @endif
        </div>
    </form>
</section>
