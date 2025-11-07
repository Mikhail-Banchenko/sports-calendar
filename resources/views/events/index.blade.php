<!-- Main page with all events -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 text-gray-900 dark:text-gray-100">
                <!-- If there are no events -->
                @if($events->isEmpty())
                    <p>No events found.</p>
                <!-- Else show every event -->
                @else
                    <ul class="space-y-2">
                        @foreach($events as $event)
                            <li>
                                <strong>{{ $event->date }} {{ $event->time }}</strong> — 
                                {{ $event->sport->name }}: 
                                {{ $event->leftTeam->name }} vs {{ $event->rightTeam->name }}
                                | Venue: {{ $event->venue ?? 'TBD' }}
                                | Description: {{ $event->description ?? 'N/A' }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>