<!-- resources/views/events/index.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- Фильтры (пока просто placeholder) -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-6 p-6 text-gray-900 dark:text-gray-100">
                <h2 class="text-lg font-semibold mb-4">Filter Events</h2>

                <form method="GET" action="{{ route('events.index') }}" class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    
                    <!-- Sport -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Sport</label>
                        <select name="sport_id" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            <option value="">All sports</option>
                            @foreach($sports as $sport)
                                <option value="{{ $sport->id }}" {{ $request->sport_id == $sport->id ? 'selected' : '' }}>
                                    {{ $sport->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Team 1 -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Team 1</label>
                        <select name="team_left" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            <option value="">All teams</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}" {{ $request->team_left == $team->id ? 'selected' : '' }}>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Team 2 -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Team 2</label>
                        <select name="team_right" class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                            <option value="">All teams</option>
                            @foreach($teams as $team)
                                <option value="{{ $team->id }}" {{ $request->team_right == $team->id ? 'selected' : '' }}>
                                    {{ $team->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Date range -->
                    <div class="col-span-1 md:col-span-3 lg:col-span-2 flex gap-2">
                        <div class="flex-1">
                            <label class="block text-sm font-medium mb-1">From</label>
                            <input type="date" name="start_date" value="{{ $request->start_date ?? now()->toDateString() }}" 
                                   class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="flex-1">
                            <label class="block text-sm font-medium mb-1">To</label>
                            <input type="date" name="end_date" value="{{ $request->end_date }}" 
                                   class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                    </div>

                    <!-- Country -->
                    <div>
                        <label class="block text-sm font-medium mb-1">Country</label>
                        <input type="text" name="country" value="{{ $request->country }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600" 
                               placeholder="Country">
                    </div>

                    <!-- City -->
                    <div>
                        <label class="block text-sm font-medium mb-1">City</label>
                        <input type="text" name="city" value="{{ $request->city }}" 
                               class="w-full rounded-md border-gray-300 dark:bg-gray-700 dark:border-gray-600" 
                               placeholder="City">
                    </div>

                    <!-- Submit button -->
                    <div class="md:col-span-3 lg:col-span-4 flex justify-end items-end">
                        <button type="submit" 
                                class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700 transition">
                            Apply Filters
                        </button>
                        <a href="{{ route('events.index') }}" 
                           class="ml-3 px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition">
                            Reset
                        </a>
                    </div>
                </form>
            </div>

            <!-- Секция со списком ивентов -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                @if($events->isEmpty())
                    <p class="text-center text-gray-600 dark:text-gray-300">No events found.</p>
                @else
                    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                        @foreach($events as $event)
                            <a href="{{ route('events.show', $event->id) }}" 
                               class="block border border-gray-200 dark:border-gray-700 rounded-xl p-5 bg-[#273041]
                                      hover:bg-gray-100 dark:hover:bg-[#2c3749] transition duration-200 ease-in-out">

                                <div class="flex justify-between items-center mb-2">
                                    <span class="text-sm text-gray-500 dark:text-gray-400">
                                        {{ \Carbon\Carbon::parse($event->date)->format('M d, Y') }} {{ $event->time }}
                                    </span>
                                    <span class="text-sm font-semibold text-blue-600 dark:text-blue-400">
                                        {{ $event->sport->name }}
                                    </span>
                                </div>

                                <h3 class="text-lg font-bold mb-2">
                                    {{ $event->leftTeam->name }} 
                                    <span class="text-gray-500">vs</span> 
                                    {{ $event->rightTeam->name }}
                                </h3>

                                <p class="text-sm text-gray-600 dark:text-gray-300 mb-1">
                                    <span class="font-semibold">Venue:</span> {{ $event->venue ?? 'TBD' }}
                                </p>

                                @if($event->description)
                                    <p class="text-sm text-gray-600 dark:text-gray-400">
                                        {{ Str::limit($event->description, 100) }}
                                    </p>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

        </div>
    </div>
</x-app-layout>
