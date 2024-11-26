<nav class="navigation-bar">
    <div class="container">
        <!-- Логотип -->
        <div class="logo">
            <a href="{{ route('dashboard') }}">
                <img src="{{ asset('images/my-icon.png') }}" alt="Logo" class="logo-img">
            </a>
        </div>

        
        <div class="menu">
            <x-nav-link :href="route('trenins.index')" :active="request()->routeIs('trenins.index')" class="nav-link">
                Trenini
            </x-nav-link>
            <x-nav-link :href="route('treners.index')" :active="request()->routeIs('treners.index')" class="nav-link">
                Treneri
            </x-nav-link>
            <x-nav-link :href="route('trenins.myFavorites')" :active="request()->routeIs('trenins.myFavorites')" class="nav-link">
                Milakie trenini
            </x-nav-link>
        </div>

        <!-- Профиль -->
        <div class="user-profile">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="profile-button">
                        <span>{{ Auth::user()->name }}</span>
                        <svg class="dropdown-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="route('profile.edit')" class="dropdown-link">
                        {{ __('Profile') }}
                    </x-dropdown-link>
                    <x-dropdown-link 
                    :href="route('logout')" 
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Log Out') }}
                    </x-dropdown-link>

                    <form method="POST" action="{{ route('logout') }}" id="logout-form" style="display: none;">
                @csrf
                    </form>

                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>
