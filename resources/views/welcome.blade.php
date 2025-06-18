<x-guest-layout>
    <div class="max-w-md w-full text-center">
        <!-- Logo -->
        <div class="flex justify-center mb-8">
            <a href="/">
                <svg class="h-20 w-auto text-primary-500" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path d="M12 2L1 9.3L3.4 11.1V21H8.9V14.1H15.1V21H20.6V11.1L23 9.3L12 2ZM12 4.2L18.6 9.1L18.4 9.3V19H16.1V12.1H7.9V19H5.6V9.3L5.4 9.1L12 4.2Z"/></svg>
            </a>
        </div>

        <h1 class="text-4xl font-bold text-secondary-800 dark:text-secondary-200">
            Welcome to Tidy Room AI
        </h1>

        <p class="mt-2 text-secondary-600 dark:text-secondary-400">
            Your personal assistant for a cleaner room.
        </p>

        <div class="mt-8 flex flex-col sm:flex-row sm:justify-center sm:space-y-0 sm:space-x-4 space-y-4">
            <a href="{{ route('login') }}" class="inline-flex items-center justify-center px-8 py-3 bg-primary-600 border border-transparent rounded-md font-semibold text-white hover:bg-primary-500 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-900 transition ease-in-out duration-150 w-full sm:w-auto">
                Log In
            </a>
            <a href="{{ route('register') }}" class="inline-flex items-center justify-center px-8 py-3 bg-secondary-200 dark:bg-secondary-700 border border-transparent rounded-md font-semibold text-secondary-800 dark:text-secondary-200 hover:bg-secondary-300 dark:hover:bg-secondary-600 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-900 transition ease-in-out duration-150 w-full sm:w-auto">
                Register
            </a>
        </div>
    </div>
</x-guest-layout>