<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ $event->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                <h3 class="text-xl font-semibold mb-2">Описание события</h3>
                <p class="text-gray-700 dark:text-gray-300 mb-4">{{ $event->description }}</p>

                <p><strong>Дата:</strong> {{ $event->date }}</p>
                <p><strong>Место:</strong> {{ $event->venue }}</p>
            </div>
        </div>
    </div>
</x-app-layout>
