<x-front-layout>
    <div class="min-h-screen shadow-inner bg-[#a7d2ca2a]">
        <h1 class="primary-heading pb-7 pt-14 text-center ">
            Restoranai
        </h1>
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 mb-20">
                @forelse ($restaurants as $restaurant)
                    {{-- restaurant card --}}
                    <article class="card">
                        {{-- card head --}}
                        <div>
                            <div
                                class="bg-[#a7d2ca] hover:bg-amber-400 transition-all duration-200 text-white p-7 rounded-t-xl shadow-lg">
                                <p class="text-xl font-['Yeseva_One'] text-cyan-900 mb-3">{{ $restaurant->title }}
                                </p>
                                <div class="grid grid-cols-1 lg:grid-cols-[55%,_40%] items-start justify-between gap-3 ">
                                    <div class="grid gap-2 justify-center items-start">

                                        @if (isset($restaurant->img))
                                            <img src="{{ asset($restaurant->img) }}" alt="meal photo"
                                                class="w-[300px] rounded-xl">
                                        @else
                                            <img src="/assets/img/fallback-img.jpg" alt="meal photo"
                                                class="w-[300px] rounded-xl">
                                        @endif
                                    </div>
                                    <div class="grid gap-2 justify-center items-start text-cyan-900">
                                        <p><i class="fa-solid fa-location-dot w-5"></i>
                                            {{ $restaurant->address }}</p>
                                        </p>
                                        <p>Virtuvė: {{ $restaurant->menu->title }}</p>
                                    </div>
                                </div>
                            </div>
                            {{-- accordion buttons --}}
                            <div
                                class="accordion-btn bg-cyan-900 py-3 w-full rounded-b-xl text-center cursor-pointer text-white transition-all delay-150">
                                APRAŠYMAS
                                <span class="arrow-down-icon"><i class="fa-solid fa-chevron-down ml-1"></i></span>
                                <span class="arrow-up-icon"><i class="fa-solid fa-chevron-up ml-1"></i></span>
                            </div>
                        </div>
                        {{-- card body --}}
                        <div class="card-body bg-cyan-800 rounded-b-xl">
                            <div class="content hidden pb-5 px-6 pt-3 text-white font-light">
                                {{ $restaurant->desc }}
                            </div>
                        </div>
                    </article>
                @empty
                    <p>Nepridėtas nė vienas restoranas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-front-layout>
