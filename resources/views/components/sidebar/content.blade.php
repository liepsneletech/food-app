<x-perfect-scrollbar as="nav" aria-label="main" class="flex flex-col flex-1 gap-2 md:gap-4 px-3">

    <x-sidebar.link title="Skydelis" href="{{ route('admin-dashboard') }}" :isActive="request()->routeIs('dashboard')">
        <x-slot name="icon">
            <i class="fa-solid fa-clipboard-check text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Teikėjai" href="{{ route('admin-providers-index') }}" :isActive="request()->routeIs('admin-providers-index')">
        <x-slot name="icon">
            <i class="fa-solid fa-building-columns text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Produktai" href="{{ route('admin-products-index') }}" :isActive="request()->routeIs('admin-products-index')">
        <x-slot name="icon">
            <i class="fa-solid fa-circle-nodes text-center w-6" aria-hidden='true'></i>
        </x-slot>
    </x-sidebar.link>

    <x-sidebar.link title="Atsiliepimai" href="{{ route('admin-reviews-index') }}" :isActive="request()->routeIs('admin-reviews-index')">
        <x-slot name="icon">
            <i class="fa-solid fa-star text-center w-6" aria-hidden='true'></i>
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
