<x-guest-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-secondary-800 shadow-md overflow-hidden sm:rounded-lg">
         <div class="flex justify-center mb-6">
            <a href="/">
                <svg class="h-16 w-auto text-primary-500" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L1 9.3L3.4 11.1V21H8.9V14.1H15.1V21H20.6V11.1L23 9.3L12 2ZM12 4.2L18.6 9.1L18.4 9.3V19H16.1V12.1H7.9V19H5.6V9.3L5.4 9.1L12 4.2Z"/></svg>
            </a>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded dark:bg-secondary-900 border-secondary-300 dark:border-secondary-700 text-primary-600 shadow-sm focus:ring-primary-500" name="remember">
                    <span class="ml-2 text-sm text-secondary-600 dark:text-secondary-400">{{ __('Remember me') }}</span>
                </label>
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100" href="{{ route('register') }}">
                    {{ __("Don't have an account?") }}
                </a>
                <x-primary-button class="ml-3">{{ __('Log in') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>