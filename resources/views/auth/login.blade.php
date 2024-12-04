<x-guest-layout>
    {{-- <div class="min-h-screen flex flex-col items-center justify-center bg-gray-100"> --}}
    <div class="bg-white p-5 rounded-lg shadow-lg w-full max-w-md">
        <!-- Logo/Title -->
        <div class="text-center mb-8">
            <h1 class="text-3xl font-bold text-gray-800">Welcome Back</h1>
            <p class="text-gray-600 mt-2">Please sign in to your account</p>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <form method="POST" action="{{ route('login') }}" class="space-y-6">
            @csrf

            <!-- Email Address -->
            <div>
                <x-input-label for="email" :value="__('Email')" class="text-gray-700 font-semibold" />
                <x-text-input id="email"
                    class="block mt-1 w-full px-2 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                    type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div>
                <x-input-label for="password" :value="__('Password')" class="text-gray-700 font-semibold" />
                <x-text-input id="password"
                    class="block mt-1 w-full px-2 py-2 rounded-md border border-gray-300 focus:border-blue-500 focus:ring focus:ring-blue-200 transition duration-200"
                    type="password" name="password" required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-end">
                @if (Route::has('password.request'))
                    <a class="text-sm text-[#233f72] hover:text-[#233f72]" href="{{ route('password.request') }}">
                        {{ __('Forgot password?') }}
                    </a>
                @endif
            </div>

            <div>
                <button type="submit"
                    class="w-full bg-[#233f72] text-white py-3 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition duration-200">
                    {{ __('Sign In') }}
                </button>
            </div>
        </form>

        <div class="mt-3 text-center">
            <a class="text-sm text-gray-600 hover:text-[#233f72] transition duration-200" href="{{ route('welcome') }}">
                ← Back to Welcome Page
            </a>
        </div>
    </div>
    </div>
</x-guest-layout>
