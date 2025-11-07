<!-- View for main page of application -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            <!-- Welcome section -->
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-8 text-gray-900 dark:text-gray-100 text-center">
                    <h1 class="text-3xl font-bold mb-4">Welcome to Sport Calendar</h1>
                    <p class="text-lg text-gray-600 dark:text-gray-300 max-w-4xl mx-auto text-justify">
                        Sport Calendar is your ultimate source for everything related to sports. 
                        Keep track of upcoming matches, tournaments, and competitions across multiple sports. 
                        Discover detailed team lineups, player statistics, and live scores as they happen. 
                        Whether you're a fan following your favorite team or an enthusiast exploring new leagues, 
                        Sport Calendar keeps you informed and engaged with real-time updates, rankings, and insights.
                    </p>
                </div>
            </div>

            <!-- Info block with links-->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Upcoming Events</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Check out the schedule of upcoming matches and tournaments.
                    </p>
                    <a href="{{ route('events.index') }}" class="text-blue-600 hover:underline">Go to Events →</a>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Teams & Players</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        Explore team lineups, key players, and detailed statistics.
                    </p>
                    <div class="mt-auto flex justify-between">
                        <a href="#" class="text-blue-600 hover:underline">View Teams →</a>
                        <a href="#" class="text-blue-600 hover:underline">View Players →</a>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-xl font-semibold mb-3 text-gray-600 dark:text-gray-300">Standings</h3>
                    <p class="text-gray-700 dark:text-gray-300 mb-4">
                        See the latest league tables, team rankings, and points.
                    </p>
                    <a href="#" class="text-blue-600 hover:underline">View Standings →</a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
