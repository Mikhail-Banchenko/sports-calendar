<!-- Main page of events admin panel. It shows a table with events and gives some links (add|edit|delete event) -->
<x-app-layout>
    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- If there is success message - show it -->
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded-lg dark:bg-green-800 dark:text-gray-100">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Button to add a new event -->
            <div class="flex justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-300">Event List</h3>
                <a href="{{ route('admin.events.create') }}"
                   class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition
                          dark:bg-blue-700 dark:hover:bg-blue-800">
                    + Add New Event
                </a>
            </div>

            <!-- Table with all events -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <table class="min-w-full text-sm text-left text-gray-700 dark:text-gray-300">
                    <thead class="bg-gray-100 dark:bg-gray-700 uppercase text-xs">
                        <tr>
                            <th class="px-6 py-3">ID</th>
                            <th class="px-6 py-3">Date</th>
                            <th class="px-6 py-3">Time</th>
                            <th class="px-6 py-3">Sport</th>
                            <th class="px-6 py-3">Left Team</th>
                            <th class="px-6 py-3">Right Team</th>
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
                                <td class="px-6 py-4">{{ $sports[$event->_sport_id - 1]->name }}</td>
                                <td class="px-6 py-4">{{ $teams[$event->_team_left_id - 1]->name }}</td>
                                <td class="px-6 py-4">{{ $teams[$event->_team_right_id - 1]->name }}</td>
                                <td class="px-6 py-4">{{ $event->venue }}</td>
                                <td class="px-6 py-4 flex space-x-2">
                                    <a href="{{ route('admin.events.edit', $event->id) }}"
                                       class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded transition
                                              dark:bg-yellow-600 dark:hover:bg-yellow-700">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.events.destroy', $event->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this event?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                                class="bg-red-600 hover:bg-red-700 text-white px-3 py-1 rounded transition
                                                       dark:bg-red-700 dark:hover:bg-red-800">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <!-- If there are no events -->
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
