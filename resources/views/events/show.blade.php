<!-- Page with 1 event and all info about it -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Event description</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $event->description }}</p>

                <p><strong>Date:</strong> {{ $event->date }}</p>
                <p><strong>Venue:</strong> {{ $event->venue }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
