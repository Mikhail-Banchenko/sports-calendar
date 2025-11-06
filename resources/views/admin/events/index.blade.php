<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin - Events') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- Success message --}}
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg">
                    {{ session('success') }}
                </div>
            @endif

            <div class="flex justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Event List</h3>
                <a href="{{ route('admin.events.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    + Add New Event
                </a>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Time</th>
                            <th class="px-6 py-3">Sport ID</th>
                            <th class="px-6 py-3">Team Left ID</th>
                            <th class="px-6 py-3">Team Right ID</th>
                            <th class="px-6 py-3">Venue</th>
                            <th class="px-6 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($events as $event)
                            <tr class="border-b dark:border-gray-700">
                                <td class="px-6 py-4">{{ $event->id }}</td>
                                <td class="px-6 py-4">{{ $event->date }}</td>
                                <td class="px-6 py-4">{{ $event->time }}</td>
                                <td class="px-6 py-4">{{ $event->_sport_id }}</td>
                                <td class="px-6 py-4">{{ $event->_team_left_id }}</td>
                                <td class="px-6 py-4">{{ $event->_team_right_id }}</td>
                                <td class="px-6 py-4">{{ $event->venue }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center py-4 text-gray-500">
                                    No events found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
