<nav x-data="{ open: false }" class="main-nav bg-white px-6">

    <!-- logo -->
    <div class="container lg:flex justify-between">
        <!-- Logo -->
        <div class="nav-header flex justify-between items-center py-4">
            <a href="{{ route('index') }}">
                <x-app-logo-front class="block h-9 w-auto fill-current text-gray-800" />
            </a>
            <button class="nav-toggle block lg:hidden text-gray-500"><i class="fa-solid fa-bars"></i></button>
        </div>

        <!-- nav -->
        <div
            class="nav-links overflow-hidden lg:overflow-visible flex flex-col lg:flex-row gap-8 items-center lg:ml-10 lg:h-auto">
            <x-nav-link :href="route('home')" :active="request()->routeIs('home')">
                {{ __('Pradžia') }}
            </x-nav-link>
            <div
                class="dropdown-trigger relative flex flex-col cursor-pointer py-1 text-medium font-medium leading-5 text-gray-500 hover:text-gray-700">
                Produktai
                <ul
                    class="dropdown-content bg-cyan-800 text-white text-sm absolute top-7 w-[160px] p-4 rounded-xl shadow-md z-10">
                    <li><a href="{{ route('products-index') }}"
                            class="inline-block mb-2 border-b-2 border-transparent hover:border-b-2 hover:border-cyan-500">Užsakyti
                            produktą</a>
                    </li>
                    <li><a href="{{ route('products-index') }}"
                            class="inline-block mb-2 border-b-2 border-transparent hover:border-b-2 hover:border-cyan-500">Produktų
                            sąrašas</a>
                    </li>
                </ul>
            </div>
            <x-nav-link :href="route('providers-index')" :active="request()->routeIs('providers-index')">
                {{ __('Teikėjai') }}
            </x-nav-link>
            <x-nav-link href="/#about" :active="request()->routeIs('/#about')">
                {{ __('Apie mus') }}
            </x-nav-link>

            @guest
                <div class="nav-front-logged-out flex flex-col lg:flex-row items-center gap-5 lg:ml-10">
                    <x-nav-link :href="route('login')" :active="request()->routeIs('login')">
                        {{ __('Prisijungti') }}
                    </x-nav-link>
                    <x-nav-link :href="route('register')" :active="request()->routeIs('register')">
                        {{ __('Registruotis') }}
                    </x-nav-link>
                </div>
            @endguest

            @auth
                <div class="flex align-center">
                    <div class="nav-front-logged-in">
                        <!-- Settings Dropdown -->
                        <div class="hidden sm:flex sm:items-center lg:ml-6">
                            <x-dropdown align="right">
                                <x-slot name="trigger">
                                    <button
                                        class="flex items-center p-2 text-md font-medium text-gray-500 rounded-md transition duration-150 ease-in-out hover:text-gray-700 focus:outline-none">
                                        <div>{{ Auth::user()->name }}</div>

                                        <div class="ml-1">
                                            <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </div>
                                    </button>
                                </x-slot>

                                <x-slot name="content"
                                    class="dropdown-content bg-[#155e75] text-white text-sm absolute top-7 w-[160px] p-4 rounded-xl shadow-md z-10">
                                    <!-- Profile -->
                                    <div>
                                        <x-dropdown-link :href="route('profile.edit')" class="mb-1.5">
                                            {{ __('Paskyra') }}
                                        </x-dropdown-link>
                                    </div>

                                    <!-- Orders -->
                                    <div>
                                        <x-dropdown-link :href="route('user-orders')" class="mb-1.5">
                                            {{ __('Užsakymai') }}
                                        </x-dropdown-link>
                                    </div>

                                    <!-- Authentication -->
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf

                                        <x-dropdown-link :href="route('logout')"
                                            onclick="event.preventDefault(); this.closest('form').submit();">
                                            {{ __('Atsijungti') }}
                                        </x-dropdown-link>
                                    </form>
                                </x-slot>
                            </x-dropdown>
                        </div>
                    </div>
                </div>
            @endauth
        </div>
    </div>
</nav>
