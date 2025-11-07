<!-- Navigation menu for admin panel -->
<nav x-data="{ open: false }" class="bg-white dark:bg-[#1d2633] border-b border-gray-100 dark:border-gray-700">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="mx-auto hidden space-x-8 sm:-my-px sm:ms-0 sm:flex">
            <x-nav-link :href="route('admin.home')" :active="request()->routeIs('admin.home')" class="pb-1">
                {{ __('Admin Home') }}
            </x-nav-link>
            <x-nav-link :href="route('admin.events.index')" :active="request()->is('admin/events') || request()->is('admin/events/*')" class="pb-1">
                {{ __('Manage Events') }}
            </x-nav-link>
            <x-nav-link href="#" :active="false">
                {{ __('Manage Teams') }}
            </x-nav-link>
            <x-nav-link href="#" :active="false">
                {{ __('Manage Players') }}
            </x-nav-link>
            <x-nav-link href="#" :active="false">
                {{ __('Manage Standings') }}
            </x-nav-link>
            <x-nav-link href="#" :active="false">
                {{ __('Settings') }}
            </x-nav-link>
        </div>
    </div>
</nav>