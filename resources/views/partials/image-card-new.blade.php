<div id="image-card-{{ $image->id }}" class="bg-white dark:bg-secondary-800 overflow-hidden shadow-lg rounded-lg transition-transform hover:scale-105" data-status="{{ $image->ai_analysis ? 'completed' : 'pending' }}">
    <img src="{{ $image->getFirstMediaUrl() }}" alt="User uploaded room" class="w-full h-56 object-cover">
    <div class="p-6">
        <!-- This section will ONLY show for the admin -->
        @auth
        @role('admin')
            <div class="mb-3 border-b border-secondary-200 dark:border-secondary-700 pb-2">
                <p class="text-xs font-semibold uppercase tracking-wider text-secondary-500 dark:text-secondary-400">
                    Uploader
                </p>
                <p class="text-sm font-medium text-secondary-800 dark:text-secondary-200">
                    {{ $image->user->name }}
                </p>
            </div>
        @endrole
        @endauth

        <div class="flex justify-between items-start mb-2">
            <div>
                <p class="text-sm text-secondary-500 dark:text-secondary-400">{{ $image->created_at->format('F j, Y') }}</p>
                <p class="text-xs text-secondary-400">Time: {{ $image->created_at->format('g:i a') }}</p>
            </div>
            <div class="text-xs font-mono px-2 py-1 rounded-full bg-secondary-100 dark:bg-secondary-700 text-secondary-600 dark:text-secondary-300">ID #{{ $image->id }}</div>
        </div>

        @if($image->comment)
            <p class="mt-4 text-sm text-secondary-600 dark:text-secondary-400 italic">"{{ $image->comment }}"</p>
        @endif

        <div class="mt-4 pt-4 border-t border-secondary-200 dark:border-secondary-700">
            <!-- This div will be populated with the final results by the JavaScript -->
            <div class="analysis-content">
                @if($image->ai_analysis)
                    <h5 class="font-semibold text-secondary-800 dark:text-secondary-200">AI Analysis:</h5>
                    <div class="mt-1 text-sm text-secondary-700 dark:text-secondary-300 whitespace-pre-wrap">{!! nl2br(e($image->ai_analysis)) !!}</div>
                    <h5 class="font-semibold mt-4 text-secondary-800 dark:text-secondary-200">Tidiness Score:</h5>
                    <p class="text-2xl font-bold text-primary-600 dark:text-primary-400">{{ $image->tidiness_score }}/100</p>
                @endif
            </div>

            <!-- This container holds the progress bar and is hidden once analysis is complete -->
            <div class="pending-container {{ $image->ai_analysis ? 'hidden' : '' }}">
                 <p class="text-sm text-secondary-500 dark:text-secondary-400 mb-2 progress-text">Analysis is pending...</p>
                 <div class="w-full bg-secondary-200 dark:bg-secondary-700 rounded-full h-2.5">
                     <div class="bg-primary-600 h-2.5 rounded-full progress-bar" style="width: 0%"></div>
                 </div>
            </div>
        </div>
    </div>
</div>