<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-secondary-800 dark:text-secondary-200 leading-tight">
            Manage Users
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-secondary-800 overflow-hidden shadow-lg sm:rounded-lg">
                <div class="p-6">
                    <table class="min-w-full divide-y divide-secondary-200 dark:divide-secondary-700">
                        <thead class="bg-secondary-50 dark:bg-secondary-700">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 dark:text-secondary-300 uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 dark:text-secondary-300 uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-secondary-500 dark:text-secondary-300 uppercase tracking-wider">Status</th>
                                <th scope="col" class="relative px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-secondary-800 divide-y divide-secondary-200 dark:divide-secondary-700">
                            @foreach ($users as $user)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-secondary-900 dark:text-secondary-100">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-secondary-500 dark:text-secondary-300">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if($user->is_blocked)
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Blocked</span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-accent-100 text-accent-800">Active</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        @if(!$user->hasRole('admin'))
                                        <form method="POST" action="{{ route('admin.users.toggle-block', $user) }}">
                                            @csrf
                                            <button type="submit" class="text-primary-600 hover:text-primary-900 dark:text-primary-400 dark:hover:text-primary-200">
                                                {{ $user->is_blocked ? 'Unblock' : 'Block' }}
                                            </button>
                                        </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>