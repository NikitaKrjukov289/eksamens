<!-- resources/views/components/navigation.blade.php -->
<nav class="bg-white text-blue-900 shadow-md">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16 items-center">
            <!-- Логотип -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('dashboard') }}">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-12">
                </a>
            </div>

            <!-- Главное меню для больших экранов -->
            <div class="hidden md:flex space-x-8">
                <x-nav-link :href="route('trenins.index')" :active="request()->routeIs('trenins.index')" class="hover:bg-blue-100 px-4 py-2 rounded-md transition-colors duration-200">
                    Trenini
                </x-nav-link>
                <x-nav-link :href="route('treners.index')" :active="request()->routeIs('treners.index')" class="hover:bg-blue-100 px-4 py-2 rounded-md transition-colors duration-200">
                    Treneri
                </x-nav-link>
                <x-nav-link :href="route('trenins.myFavorites')" :active="request()->routeIs('trenins.myFavorites')" class="hover:bg-blue-100 px-4 py-2 rounded-md transition-colors duration-200">
                    Milakie trenini
                </x-nav-link>
            </div>

            <!-- Профиль пользователя -->
            <div class="flex items-center space-x-4">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-blue-900 space-x-2 hover:bg-blue-100 px-4 py-2 rounded-md transition-colors duration-200">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ml-2 h-5 w-5 text-blue-900" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="text-gray-900 hover:bg-blue-100 px-4 py-2 rounded-md transition-colors duration-200">
                            {{ __('Profile') }}
                        </x-dropdown-link>
                        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="text-gray-900 hover:bg-blue-100 px-4 py-2 rounded-md transition-colors duration-200">
                            {{ __('Log Out') }}
                        </x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        </div>
    </div>
</nav>
