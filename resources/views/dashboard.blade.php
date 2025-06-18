<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-8">
                <a href="{{ route('room-images.create') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-primary-500 focus:bg-primary-700 active:bg-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500 focus:ring-offset-2 dark:focus:ring-offset-secondary-900 transition ease-in-out duration-150">
                    Upload Room Photo
                </a>
            </div>

            <div>
                <h3 class="text-2xl font-semibold text-secondary-800 dark:text-secondary-200 mb-4">Your Upload History</h3>
                <div id="image-history-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8" data-user-id="{{ auth()->id() }}">
                    @forelse ($roomImages as $image)
                        @include('partials.image-card-new', ['image' => $image])
                    @empty
                        <div id="empty-history-message" class="col-span-full bg-white dark:bg-secondary-800 overflow-hidden shadow-lg rounded-lg">
                            <div class="p-8 text-center text-secondary-900 dark:text-secondary-100">
                                <p class="font-semibold text-lg">No photos yet!</p>
                                <p class="text-sm mt-1">Click the "Upload Room Photo" button to get your first analysis.</p>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>