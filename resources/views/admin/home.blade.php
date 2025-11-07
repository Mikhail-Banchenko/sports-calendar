<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100">
                    
                    <h3 class="text-2xl font-semibold mb-6">Welcome to the Admin Panel</h3>
                    <p class="mb-8 text-gray-600 dark:text-gray-300">
                        From this dashboard, you can manage all data related to the sports calendar,
                        including events, teams, players, and other site information.
                    </p>

                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        <!-- Events -->
                        <a href="{{ route('admin.events.index') }}" 
                           class="block bg-indigo-600 hover:bg-indigo-700 text-white text-center font-semibold py-6 rounded-lg shadow transition">
                            Manage Events
                        </a>

                        <!-- Teams -->
                        <a href="#" 
                           class="block bg-blue-600 hover:bg-blue-700 text-white text-center font-semibold py-6 rounded-lg shadow transition">
                            Manage Teams
                        </a>

                        <!-- Players -->
                        <a href="#" 
                           class="block bg-green-600 hover:bg-green-700 text-white text-center font-semibold py-6 rounded-lg shadow transition">
                            Manage Players
                        </a>

                        <!-- Sports -->
                        <a href="#" 
                           class="block bg-yellow-500 hover:bg-yellow-600 text-white text-center font-semibold py-6 rounded-lg shadow transition">
                            Manage Sports
                        </a>

                        <!-- Users -->
                        <a href="#" 
                           class="block bg-purple-600 hover:bg-purple-700 text-white text-center font-semibold py-6 rounded-lg shadow transition">
                            Manage Users
                        </a>

                        <!-- Settings -->
                        <a href="#" 
                           class="block bg-gray-700 hover:bg-gray-800 text-white text-center font-semibold py-6 rounded-lg shadow transition">
                            Settings
                        </a>

                    </div>

                    <div class="mt-10 text-center text-sm text-gray-500 dark:text-gray-400">
                        Admin Panel © {{ date('Y') }} — Sports Calendar Project
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
