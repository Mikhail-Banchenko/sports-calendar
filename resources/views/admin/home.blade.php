<!-- resources/views/admin/dashboard.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Welcome section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-3xl font-bold mb-4">Welcome to Admin Panel</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-4xl mx-auto text-justify">
                        From this dashboard, you can manage all aspects of the Sport Calendar site:
                        events, teams, players, sports categories, users, and site settings.
                        Navigate through the sections below to perform updates efficiently.
                    </p>
                </div>
            </div>

            <!-- Admin links as info blocks -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

                <!-- Manage Events -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Manage Events</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Create, edit, and delete events in the sports calendar.
                    </p>
                    <a href="{{ route('admin.events.index') }}" class="mt-auto text-blue-600 hover:underline">Manage Events →</a>
                </div>

                <!-- Manage Teams -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Manage Teams</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Update team information, rosters, and stats.
                    </p>
                    <a href="#" class="mt-auto text-blue-600 hover:underline">Manage Teams →</a>
                </div>

                <!-- Manage Players -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Manage Players</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Add and edit player profiles and performance data.
                    </p>
                    <a href="#" class="mt-auto text-blue-600 hover:underline">Manage Players →</a>
                </div>

                <!-- Manage Sports -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Manage Sports</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Manage sports categories and associated events.
                    </p>
                    <a href="#" class="mt-auto text-blue-600 hover:underline">Manage Sports →</a>
                </div>

                <!-- Manage Users -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Manage Users</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Control user accounts, roles, and permissions.
                    </p>
                    <a href="#" class="mt-auto text-blue-600 hover:underline">Manage Users →</a>
                </div>

                <!-- Settings -->
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6 flex flex-col">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Settings</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Configure global site settings and preferences.
                    </p>
                    <a href="#" class="mt-auto text-blue-600 hover:underline">Manage Settings →</a>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
