<x-front-layout>
    <div class="min-h-screen shadow-inner bg-[#a7d2ca2a]">
        <h1 class="primary-heading pb-7 pt-14 text-center ">
            Patiekalai
        </h1>

        {{-- sort, filter, search --}}
        <div class="container flex mb-8 justify-between border px-7 py-4 rounded-[35px] border-cyan-300">
            <form action="{{ route('meals-index') }}">
                {{-- filter --}}
                <label for="restaurant_id" class="filters-label font-semibold text-cyan-900">Restoranas:</label>
                <select name="restaurant_id" id="restaurant_id"
                    class=" border-0 rounded-full focus:border-cyan-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400 text-gray-500 mr-2">
                    <option selected disabled value="Pasirinkite šalį">Pasirinkite restoraną</option>
                    @foreach ($restaurants as $restaurant)
                        <option value="{{ $restaurant->id }}" @if ($restaurant->id == $restaurantshow) selected @endif>
                            {{ $restaurant->title }}</option>
                    @endforeach
                </select>

                {{-- sort --}}
                <label for="sort" class="filters-label font-semibold text-cyan-900">Rikiuoti:</label>
                <select name="sort" id="sort"
                    class=" border-0 rounded-full focus:border-cyan-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400 text-gray-500">
                    <option selected disabled>Numatytasis rikiavimas</option>
                    @foreach ($sortSelect as $value => $price)
                        <option value="{{ $value }}" @if ($sortShow == $value) selected @endif>
                            {{ $price }}</option>
                    @endforeach
                </select>

                <button class="text-white secondary-btn ml-3 rounded-[20px]" type="submit"><i
                        class="fa-solid fa-arrow-right pt-1" title="Filtruoti"></i></button>
                <a href="{{ route('meals-index') }}"
                    class="text-white gray-btn inline-block bg-gray-400 ml-2 rounded-[20px]"><i
                        class="fa-solid fa-arrows-rotate pt-1" title="Išvalyti"></i></a>
            </form>

            {{-- search --}}
            <form class="search-form" action="{{ route('meals-index') }}">
                <input type="text" placeholder="Ieškoti..."
                    class="search-input rounded-[20px] border-none focus:ring-0 focus:ring-offset-0" name="s"
                    value="@if (isset($meals) && count($meals) == 0) {{ $searchTerm }} @endif">
                <button class="text-white gray-btn inline-block bg-gray-400 ml-2 rounded-[20px]"><i
                        class="fa-solid fa-magnifying-glass" title="Ieškoti"></i></button>
            </form>
        </div>

        {{-- meals --}}
        <div class="container pb-20">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 ">
                @forelse ($meals as $meal)
                    {{-- meal card --}}
                    <article
                        class="card rounded-xl flex flex-col justify-between overflow-hidden bg-[#a7d2ca] hover:bg-amber-400 hover:brightness-90 transition-all duration-200 text-white shadow-lg">
                        {{-- card head --}}

                        @if (isset($meal->img))
                            <img src="{{ asset($meal->img) }}" alt="meal photo" class="w-full rounded-t-xl">
                        @else
                            <img src="/assets/img/fallback-img.jpg" alt="meal photo" class="w-full rounded-t-xl">
                        @endif
                        <div
                            class="grid grid-cols-1 md:grid-cols-[35%_60%] justify-between py-7 pl-7 pr-5 text-cyan-900">
                            <div>
                                <p class="text-2xl font-['Yeseva_One'] mb-3">{{ $meal->title }}
                                </p>
                                <p><i class="fa-solid fa-tag w-4"></i>
                                    &euro; {{ $meal->price }}</p>
                                <p><i class="fa-solid fa-location-dot w-4"></i>
                                    {{ $meal->restaurant->title }}</p>
                            </div>
                            <p class="pt-2">{{ substr($meal->desc, 0, 115) . '...' }}</p>
                        </div>
                        <a href="{{ route('single-meal', $meal) }}"
                            class="card-btn self-end bg-cyan-900 hover:bg-[#124253] py-3 w-full uppercase text-center cursor-pointer text-white transition-all inline-block">
                            Peržiūrėti
                        </a>
                    </article>
                @empty
                    <p class="text-gray-500">Nepridėtas nė vienas patiekalas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-front-layout>
