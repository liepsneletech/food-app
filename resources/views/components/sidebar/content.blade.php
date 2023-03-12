<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-2 md:gap-4 px-3">

    <x-sidebar.link title="Skydelis" href="{{ route('admin-dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <i class="fa-solid fa-clipboard-check text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Restoranai" href="{{ route('admin-restaurants-index') }}" :isActive="request()->routeIs('admin-restaurants-index')">
        <x-slot name="icon">
            <i class="fa-solid fa-building-columns text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Virtuvės" href="{{ route('admin-menus-index') }}" :isActive="request()->routeIs('admin-menus-index')">
        <x-slot name="icon">
            <i class="fa-solid fa-fire-flame-curved text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Patiekalai" href="{{ route('admin-meals-index') }}" :isActive="request()->routeIs('admin-meals-index')">
        <x-slot name="icon">
            <i class="fa-solid fa-bowl-rice text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Užsakymai" href="{{ route('admin-orders-index') }}" :isActive="request()->routeIs('register')">
        <x-slot name="icon">
            <i class="fa-brands fa-buffer text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Vartotojai" href="{{ route('admin-users-index') }}" :isActive="request()->routeIs('register')">
        <x-slot name="icon">
            <i class="fa-solid fa-address-book text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <div class="md:hidden border-t border-gray-300 pt-4">
        <x-sidebar.link title="Paskyra" href="{{ route('profile.edit') }}" :isActive="request()->routeIs('profile.edit')">
            <x-slot name="icon">
                <i class="fa-solid fa-user text-center w-6" aria-hidden='true'></i>
            </x-slot>
        </x-sidebar.link>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-sidebar.link title="Atsijungti" href="{{ route('logout') }}" :isActive="request()->routeIs('logout')"
                onclick="event.preventDefault(); this.closest('form').submit();">
                <x-slot name="icon">
                    <i class="fa-solid fa-right-to-bracket"></i>
                </x-slot>
            </x-sidebar.link>
        </form>

    </div>

</x-perfect-scrollbar>
