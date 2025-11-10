<!-- event edit page -->
<x-app-layout>
    <div class="py-6">
        <div class="max-w-3xl mx-auto lg:px-8">
            <div class="flex justify-center mb-6">
                <h2 class="text-2xl font-semibold text-gray-700 dark:text-gray-300">Edit Event</h2>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- If there are some errors show it -->
                    {{-- Validation Errors --}}
                    @if ($errors->any())
                        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded-lg dark:bg-red-800 dark:text-gray-100">
                            <ul class="list-disc list-inside">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Add form -->
                    <form method="POST" action="{{ route('admin.events.update', $event->id) }}">
                        @csrf
                        @method('PUT')

                        <!-- Date input -->
                        <div class="mb-4">
                            <label for="date" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Date') }}
                            </label>
                            <input id="date" name="date" type="date" value="{{ old('date', $event->date) }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700
                                       focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Time input -->
                        <div class="mb-4">
                            <label for="time" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Time') }}
                            </label>
                            <input id="time" name="time" type="time" value="{{ old('time', \Carbon\Carbon::parse($event->time)->format('H:i')) }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700
                                       focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Sport select (gives choice of all sports from DB) -->
                        <div class="mb-4">
                            <label for="_sport_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Sport') }}
                            </label>
                            <select id="_sport_id" name="_sport_id"
                                class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-700 rounded-md shadow-sm
                                    focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($sports as $sport)
                                    <option value="{{ $sport->id }}" {{ $sport->id == old('_sport_id', $event->_sport_id) ? 'selected' : '' }}>
                                        {{ $sport->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Team select (gives choice of all teams from DB) -->
                        <div class="mb-4">
                            <label for="_team_left_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Left Team') }}
                            </label>
                            <select id="_team_left_id" name="_team_left_id"
                                class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-700 rounded-md shadow-sm
                                    focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == old('_team_left_id', $event->_team_left_id) ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Second team select (gives choice of all teams from DB) -->
                        <div class="mb-4">
                            <label for="_team_right_id" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Right Team') }}
                            </label>
                            <select id="_team_right_id" name="_team_right_id"
                                class="mt-1 block w-full bg-gray-100 dark:bg-gray-700 border-gray-300 dark:border-gray-700 rounded-md shadow-sm
                                    focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach($teams as $team)
                                    <option value="{{ $team->id }}" {{ $team->id == old('_team_right_id', $event->_team_right_id) ? 'selected' : '' }}>
                                        {{ $team->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Country input -->
                        <div class="mb-4">
                            <label for="country" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Country') }}
                            </label>
                            <input id="country" name="country" type="text" value="{{ old('country', $event->country) }}" placeholder="Write country here..."
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-700
                                       focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- City input -->
                        <div class="mb-4">
                            <label for="city" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('City') }}
                            </label>
                            <input id="city" name="city" type="text" value="{{ old('city', $event->city) }}" placeholder="Write city here..."
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-700
                                       focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Venue input -->
                        <div class="mb-4">
                            <label for="venue" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Venue') }}
                            </label>
                            <input id="venue" name="venue" type="text" value="{{ old('venue', $event->venue) }}"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700
                                       focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <!-- Description textarea -->
                        <div class="mb-4">
                            <label for="description" class="block font-medium text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Description') }}
                            </label>
                            <textarea id="description" name="description"
                                class="mt-1 block w-full border-gray-300 dark:border-gray-700 rounded-md shadow-sm bg-gray-100 dark:bg-gray-700
                                       focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                rows="4">{{ old('description', $event->description) }}</textarea>
                        </div>

                        <!-- Buttons to cancel or submit creating -->
                        <div class="flex items-center justify-end space-x-4 mt-6">
                            <a href="{{ route('admin.events.index') }}"
                               class="bg-red-700 hover:bg-red-800 text-gray-100 font-bold py-2 px-4 rounded transition">
                                {{ __('Cancel') }}
                            </a>
                            <button type="submit"
                                class="bg-blue-700 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded transition">
                                {{ __('Update Event') }}
                            </button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
