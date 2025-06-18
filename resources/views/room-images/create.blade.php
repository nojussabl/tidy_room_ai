<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
            {{ __('Upload Room Photo') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-secondary-800 overflow-hidden shadow-lg rounded-lg">
                <div class="p-6 md:p-8">
                    <form id="upload-form" method="POST" action="{{ route('room-images.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-input-label for="image" :value="__('Room Photo (JPG or PNG)')" />
                            <input id="image" class="block mt-1 w-full text-sm text-secondary-900 border border-secondary-300 rounded-lg cursor-pointer bg-secondary-50 dark:text-secondary-400 focus:outline-none dark:bg-secondary-700 dark:border-secondary-600 dark:placeholder-secondary-400" type="file" name="image" required />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                        </div>

                        <div class="mt-6">
                            <x-input-label for="time_of_day" :value="__('Time of Day')" />
                            <select name="time_of_day" id="time_of_day" class="block mt-1 w-full border-secondary-300 dark:border-secondary-700 dark:bg-secondary-900 dark:text-secondary-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm">
                                <option value="morning">Morning</option>
                                <option value="evening">Evening</option>
                            </select>
                        </div>

                        <div class="mt-6">
                            <x-input-label for="comment" :value="__('Comment (optional)')" />
                            <textarea id="comment" name="comment" rows="4" class="block mt-1 w-full border-secondary-300 dark:border-secondary-700 dark:bg-secondary-900 dark:text-secondary-300 focus:border-primary-500 dark:focus:border-primary-600 focus:ring-primary-500 dark:focus:ring-primary-600 rounded-md shadow-sm"></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-8">
                            <x-primary-button>
                                {{ __('Upload and Analyze') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>