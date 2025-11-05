<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Sport Calendar') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Блок приветствия --}}
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-3xl font-bold mb-2">Добро пожаловать на Sport Calendar</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Следи за спортивными событиями, командами и результатами в реальном времени.
                    </p>
                    <a href="{{ route('events.index') }}" 
                       class="inline-block mt-6 px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700">
                        Смотреть события
                    </a>
                </div>
            </div>

            {{-- Блок актуальной информации --}}
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                {{-- Карточка событий --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3">Ближайшие события</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Ознакомься с расписанием предстоящих матчей и турниров.
                    </p>
                    <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline">Перейти к событиям →</a>
                </div>

                {{-- Карточка команд --}}
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3">Команды и игроки</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Узнай больше о составах команд, ключевых игроках и их статистике.
                    </p>
                    <a href="#" class="text-blue-600 hover:underline">Посмотреть команды →</a>
                </div>

                {{-- Карточка для админов --}}
                @if(Auth::check() && Auth::user()->is_admin)
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3">Админ-панель</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Управляй событиями, командами и пользователями.
                    </p>
                    <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">Перейти в админку →</a>
                </div>
                @endif

            </div>
        </div>
    </div>
</x-app-layout>
