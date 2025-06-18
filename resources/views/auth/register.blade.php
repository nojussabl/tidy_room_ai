<x-guest-layout>
    <div class="w-full sm:max-w-md mt-6 px-6 py-8 bg-white dark:bg-secondary-800 shadow-md overflow-hidden sm:rounded-lg">
         <div class="flex justify-center mb-6">
            <a href="/">
                <svg class="h-16 w-auto text-primary-500" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L1 9.3L3.4 11.1V21H8.9V14.1H15.1V21H20.6V11.1L23 9.3L12 2ZM12 4.2L18.6 9.1L18.4 9.3V19H16.1V12.1H7.9V19H5.6V9.3L5.4 9.1L12 4.2Z"/></svg>
            </a>
        </div>

        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div>
                <x-input-label for="name" :value="__('Name')" />
                <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
            <div class="mt-4">
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-4">
                <x-input-label for="role" :value="__('I am a...')" />
                <select name="role" id="role" class="block mt-1 w-full border-secondary-300 dark:border-secondary-700 dark:bg-secondary-900 dark:text-secondary-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm">
                    <option value="child">Child</option>
                    <option value="parent">Parent</option>
                </select>
            </div>
            <div class="mt-4">
                <x-input-label for="password" :value="__('Password')" />
                <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required />
            </div>
            <div class="mt-4">
                <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                <x-text-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required />
            </div>
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>
                <x-primary-button class="ml-4">{{ __('Register') }}</x-primary-button>
            </div>
        </form>
    </div>
</x-guest-layout>