<!-- Page with 1 event and all info about it -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                
                <!-- Header -->
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                    <h1 class="text-2xl font-bold">
                        <span class="text-blue-600 dark:text-blue-400">{{ $event->sport->name }}</span> — {{ $event->leftTeam->name }} vs {{ $event->rightTeam->name }}
                    </h1>
                    <span class="text-blue-600 dark:text-blue-400">
                        {{ \Carbon\Carbon::parse($event->date)->format('F j, Y') }} at {{ \Carbon\Carbon::parse($event->time)->format('H:i') }}
                    </span>
                </div>

                <!-- Venue and Description -->
                <div class="space-y-4">
                    <div>
                        <p>{{ $event->description ?? 'No description available.' }}</p>
                    </div>
                    <div>
                        <span class="text-sm text-gray-600 dark:text-gray-400">{{$event->country ?? 'TBD' }}, {{$event->city ?? 'TBD' }}, {{ $event->venue ?? 'TBD' }}</span>
                    </div>                    
                </div>

                <!-- Teams Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-8">
                    <!-- Left Team -->
                    <a href="#" 
                        class="block border border-gray-200 rounded-xl p-5 bg-gray-50 hover:bg-gray-100 transition
                               dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-[#273041]">
                        <h3 class="text-xl font-semibold mb-3">{{ $event->leftTeam->name }}</h3>
                        
                        @if(isset($event->leftTeam->players) && $event->leftTeam->players->count())
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($event->leftTeam->players as $player)
                                    <li>{{ $player->name }} — {{ $player->position ?? 'Player' }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No player data available.</p>
                        @endif
                    </a>

                    <!-- Right Team -->
                    <a href="#" 
                        class="block border border-gray-200 rounded-xl p-5 bg-gray-50 hover:bg-gray-100 transition
                               dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-[#273041]">
                        <h3 class="text-xl font-semibold mb-3">{{ $event->rightTeam->name }}</h3>
                        
                        @if(isset($event->rightTeam->players) && $event->rightTeam->players->count())
                            <ul class="list-disc list-inside space-y-1">
                                @foreach($event->rightTeam->players as $player)
                                    <li>{{ $player->name }} — {{ $player->position ?? 'Player' }}</li>
                                @endforeach
                            </ul>
                        @else
                            <p class="text-gray-500">No player data available.</p>
                        @endif
                    </a>
                </div>

                <!-- Back Button -->
                <div class="mt-8">
                    <a href="{{ route('events.index') }}" 
                       class="inline-block px-4 py-2 bg-gray-400 text-white rounded-md hover:bg-gray-500 transition
                              dark:bg-gray-600 dark:hover:bg-gray-700">
                        ← Back to Events
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

