<nav aria-label="secondary" x-data="{ open: false }"
    class="sticky top-0 z-10 flex items-center justify-between px-4 py-4 sm:px-6 transition-transform duration-500 bg-white"
    :class="{
        '-translate-y-full': scrollingDown,
        'translate-y-0': scrollingUp,
    }">

    <div class="flex items-center gap-3">

        <a href="{{ route('admin-dashboard') }}" class="block md:hidden">
            <x-app-logo-back aria-hidden="true" class="w-10 h-10" />

            <span class="sr-only">Skydelis</span>
        </a>

    </div>

    <div class="flex items-center gap-3">

        <x-dropdown align="right">
            <x-slot name="trigger">
                <button
                    class="hidden md:flex items-center p-2 text-md font-medium text-gray-500 rounded-md transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                    <div>{{ Auth::user()->name }}</div>

                    <div class="ml-1">
                        <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd" />
                        </svg>
                    </div>
                </button>
            </x-slot>

            <x-slot name="content"
                class="dropdown-content bg-cyan-800 text-white text-sm absolute top-7 w-[160px] p-4 rounded-xl shadow-md z-10">
                <!-- Profile -->
                <x-dropdown-link :href="route('profile.edit')" class="mb-1.5">
                    {{ __('Paskyra') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
                        {{ __('Atsijungti') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>

        <x-button type="button" icon-only sr-text="Open main menu" x-on:click="isSidebarOpen = !isSidebarOpen"
            class="md:hidden bg-white focus:bg-white hover:bg-white p-0">
            <x-heroicon-o-menu x-show="!isSidebarOpen" aria-hidden="true" class="w-6 h-6 bg-white text-gray-500"
                border-0 />

            <x-heroicon-o-x x-show="isSidebarOpen" aria-hidden="true" class="w-6 h-6 bg-white text-gray-500" />
        </x-button>
    </div>
</nav>
