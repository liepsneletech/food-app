<x-front-layout>

    {{-- hero section --}}
    <section
        class="hero bg-[url('/public/assets/img/hero-bg.jpg')] bg-cover bg-no-repeat bg-fixed hero h-[85.5vh] flex items-center relative">
        <div class="container">
            <div class=" flex flex-col items-end gap-4">
                <h1 class="primary-heading text-right">Atrask naujus skonius!</h1>
                <p class="font-['Josefin_Sans'] lg:w-[40%] text-right mb-4 text-cyan-900">Curabitur aliquet quam amet,
                    consectetur
                    adipiscing elit lorem ut libero malesuada luctus et ultrices posuere cubilia feugiat adipiscing elit
                    ac diam sit amet.</p>
                <a href="{{ route('restaurants-index') }}" class="primary-btn">Restoranai</a>
            </div>
            <a href="#popular-meals"
                class="text-3xl opacity-85 text-cyan-800 absolute right-[50%] translate-x-1/2 bottom-8 animate-pulse"><i
                    class="fa-solid fa-angles-down"></i></a>
        </div>
    </section>

    {{-- popular meals section --}}
    <section class="popular-meals container" id="popular-meals">
        <h2 class="primary-heading text-center mb-16">Populiariausi patiekalai</h2>
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-10 ">
            @forelse ($popularMeals as $popularMeal)
                {{-- meal card --}}
                <article
                    class="card rounded-xl flex flex-col justify-between overflow-hidden bg-[#a7d2ca] hover:bg-amber-400 hover:brightness-90 transition-all duration-200 text-white shadow-lg">
                    {{-- card head --}}

                    @if (isset($popularMeal->img))
                        <img src="{{ asset($popularMeal->img) }}" alt="meal photo" class="w-full rounded-t-xl">
                    @else
                        <img src="/assets/img/fallback-img.jpg" alt="meal photo" class="w-full rounded-t-xl">
                    @endif
                    <div class="py-7 pl-7 pr-5 text-cyan-900">
                        <div>
                            <p class="text-2xl font-['Yeseva_One'] mb-3">{{ $popularMeal->title }}
                            </p>
                            <p><i class="fa-solid fa-tag w-4"></i>
                                &euro; {{ $popularMeal->price }}</p>

                            <p><i class="fa-solid fa-location-dot w-4"></i>
                                @foreach ($restaurants as $restaurant)
                                    @if ($restaurant->id == $popularMeal->restaurant_id)
                                        {{ $restaurant->title }}
                                    @endif
                                @endforeach
                            </p>
                        </div>
                    </div>
                    {{-- <a href="{{ route('single-meal', $popularMeal) }}"
                        class="card-btn self-end bg-cyan-900 hover:bg-[#124253] py-3 w-full uppercase text-center cursor-pointer text-white transition-all inline-block">
                        Peržiūrėti
                    </a> --}}
                </article>
            @empty
                <p>Nepridėtas nė vienas patiekalas.</p>
            @endforelse
        </div>
    </section>


    {{-- slider section --}}
    <section class="slider-section relative p-0">
        <div class="slider-container">
            <div class="slide">
                <h3 class="slider-heading">Slide 1</h3>
                <img src="/assets/img/slide-1.jpg" alt="abstraction image" class="slide-img">
            </div>
            <div class="slide">
                <h3 class="slider-heading">Slide 2</h3>
                <img src="/assets/img/slide-2.jpg" alt="abstraction image" class="slide-img">
            </div>
            <div class="slide">
                <h3 class="slider-heading">Slide 3</h3>
                <img src="/assets/img/slide-3.jpg" alt="abstraction image" class="slide-img">
            </div>
        </div>
        <div class="btns-container">
            <button type="button" class="prevBtn pl-5 text-white text-2xl absolute left-0 top-1/2 -translate-y-1/3"><i
                    class="fa-solid fa-chevron-left"></i></button>
            <button type="button" class="nextBtn pr-5 text-white text-2xl absolute right-0 top-1/2 -translate-y-1/3"><i
                    class="fa-solid fa-chevron-right"></i></button>
        </div>
    </section>

    {{-- about section --}}
    <section class="about container" id="about">
        <h2 class="primary-heading text-center mb-16">Apie mus</h2>
        <div class="features grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-amber-300 flex items-center justify-center">
                    <i class="fa-solid fa-lightbulb"></i>
                </div>
                <p class="text-gray-600">Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.
                    Vestibulum ante ipsum primis in
                    faucibus orci luctus et ultrices posuere cubilia Curae.</p>
            </div>
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-[#a9ecea] flex items-center justify-center">
                    <i class="fa-solid fa-hand-holding-heart"></i>
                </div>
                <p class="text-gray-600">Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Pellentesque
                    in ipsum id orci porta dapibus. Proin eget tortor risus.</p>
            </div>
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-amber-300 flex items-center justify-center">
                    <i class="fa-solid fa-paperclip"></i>
                </div>
                <p class="text-gray-600">Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin
                    eget tortor risus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.</p>
            </div>
            <div class="feature flex flex-col gap-5 items-center">
                <div
                    class="text-4xl text-gray-500 w-10 h-10 p-10 rounded-full bg-[#a9ecea] flex items-center justify-center">
                    <i class="fa-solid fa-location-dot"></i>
                </div>
                <p class="text-gray-600">Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet,
                    consectetur adipiscing elit. Sed porttitor lectus nibh.</p>
            </div>
        </div>
    </section>

    {{-- contact us section --}}
    <section class="items bg-gray-100" id="contacts">
        <div class="container">

            <form method="post" class="w-1/2 mx-auto" action="{{ route('send-email') }}">
                @csrf

                <h2 class="primary-heading text-center">Susisiekite</h2>

                <!-- Success message -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <x-form.label for="name" :value="__('Vardas')" />
                <x-form.input id="name" class="block mt-1 w-full mb-4 text-gray-500" type="text" name="name"
                    :value="old('name')" />

                @error('name')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="email" :value="__('El. paštas')" />
                <x-form.input id="email" class="block mt-1 w-full mb-4 text-gray-500" type="email" name="email"
                    :value="old('email')" />

                @error('email')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="desc" :value="__('Žinutė:')" class="mt-3" />
                <textarea name="desc" id="desc" rows="3"
                    class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                focus:ring-cyan-100 text-gray-500">{{ old('desc') }}</textarea>

                @error('desc')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <button class="mt-4 mb-10 secondary-btn" type="submit">
                    Siųsti
                </button>
            </form>
        </div>
    </section>
</x-front-layout>
