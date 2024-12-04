<x-guest-layout>
    {{-- <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100"> --}}
        <div class="bg-white p-5 rounded-lg shadow-lg w-full max-w-md">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
        
                <!-- Name -->
                <div>
                    <x-input-label for="username" :value="__('username')" />
                    <x-text-input id="username" class="block mt-1 w-full" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('username')" class="mt-2" />
                </div>
        
                <!-- Email Address -->
                <div class="mt-1">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
        
                <div class="mt-1">
                    <x-input-label for="role" :value="__('Role')" />
                    <select id="role" name="role" class="block mt-1 w-full" required>
                        <option value="default" selected disabled>{{ __('Select Role') }}</option>
                        <option value="employer">{{ __('Employer') }}</option>
                        <option value="job_seeker">{{ __('Job Seeker') }}</option>
                    </select>
                    <x-input-error :messages="$errors->get('role')" class="mt-2" />
                </div>
        
                <!-- Password -->
                <div class="mt-1">
                    <x-input-label for="password" :value="__('Password')" />
        
                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
        
                <!-- Confirm Password -->
                <div class="mt-1">
                    <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
        
                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />
        
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
        
                <div class="flex items-center justify-between mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-[#233f72] rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#233f72]" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>
        
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>
            </form>

            <div class="mt-1 text-center">
                <a class="text-sm text-gray-600 hover:text-[#233f72] transition duration-200" href="{{ route('welcome') }}">
                    ← Back to Welcome Page
                </a>
            </div>
        </div>
    </div>
</x-guest-layout>
