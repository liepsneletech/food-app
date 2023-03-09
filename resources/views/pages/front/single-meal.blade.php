<x-front-layout>
    <div class="min-h-screen shadow-inner bg-[#a7d2ca2a]">

        <h1 class="primary-heading pb-7 pt-14 text-center ">
            {{ $meal->title }}
        </h1>

        {{-- meal info --}}
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 bg-amber-400 rounded-xl mb-16">
                @if (isset($meal->img))
                    <img src="{{ asset($meal->img) }}" alt="meal photo"
                        class="w-full rounded-t-xl lg:rounded-l-xl lg:rounded-tr-none">
                @else
                    <img src="/assets/img/fallback-img.jpg" alt="meal photo"
                        class="w-full rounded-t-xl lg:rounded-l-xl lg:rounded-tr-none">
                @endif
                <div class="p-8 text-cyan-900 font-semibold flex flex-col gap-5">
                    <p class="p-5 bg-white rounded-xl">{{ $meal->desc }}</p>
                    <div class="flex justify-between items-center mb-5">
                        <div>
                            <p class="text-lg"><i class="fa-solid fa-location-dot w-4"></i>
                                {{ $meal->restaurant->title }}</p>
                            <p class="text-xl"><i class="fa-solid fa-tag w-4"></i>
                                &euro; {{ $meal->price }}</p>
                        </div>
                        <p class="text-3xl flex items-center gap-1"><i class="fa-solid fa-star text-xl pb-1"></i> 4.5
                        </p>
                    </div>

                    {{-- checkout button --}}
                    @auth
                        <form action="{{ route('checkout', $meal) }}"
                            class="flex align-center justify-between gap-4 flex-nowrap">
                            @csrf
                            <button class="secondary-btn bg-cyan-900 hover:bg-cyan-800" type="submit">
                                Užsakyti
                            </button>
                        </form>
                    @endauth

                    @guest
                        <div>
                            <a href="{{ route('login') }}" class="secondary-btn inline-block bg-cyan-900 hover:bg-cyan-800">
                                {{ __('Prisijungti ir užsakyti') }}
                            </a>
                        </div>
                    @endguest

                </div>
            </div>
        </div>

        {{-- restaurant info --}}
        <div class="bg-cyan-900">
            <div class="container text-white pb-28">
                <h2 class="primary-heading text-center pt-20 pb-10 text-white">Apie teikėją</h2>
                <p>{{ $meal->restaurant->desc }}</p>
            </div>
        </div>
    </div>
</x-front-layout>
