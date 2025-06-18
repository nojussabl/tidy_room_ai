<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
            Admin Dashboard
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-6 flex space-x-4">
                <a href="{{ route('admin.users') }}" class="inline-flex items-center px-4 py-2 bg-secondary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-secondary-500 active:bg-secondary-700 focus:outline-none focus:ring-2 focus:ring-secondary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-800 transition ease-in-out duration-150">Manage Users</a>
                <a href="{{ route('admin.export') }}" class="inline-flex items-center px-4 py-2 bg-accent-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-accent-500 active:bg-accent-700 focus:outline-none focus:ring-2 focus:ring-accent-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-800 transition ease-in-out duration-150">Export All Data</a>
            </div>
            <h3 class="text-2xl font-semibold text-secondary-800 dark:text-secondary-200 mb-4">All User Uploads</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse ($allImages as $image)
                    @include('partials.image-card-new', ['image' => $image])
                @empty
                    <p class="col-span-full text-center text-secondary-500 dark:text-secondary-400">No images have been uploaded by any user yet.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>