<x-front-layout>
    <div class="min-h-screen shadow-inner bg-[#a7d2ca2a]">

        <h1 class="primary-heading pb-7 pt-14 text-center ">
            {{ $product->title }}
        </h1>

        {{-- product info --}}
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 bg-amber-400 rounded-xl mb-16">
                @if (isset($product->img))
                    <img src="{{ asset($product->img) }}" alt="product photo"
                        class="w-full rounded-t-xl lg:rounded-l-xl lg:rounded-tr-none">
                @else
                    <img src="/assets/img/fallback-img.jpg" alt="product photo"
                        class="w-full rounded-t-xl lg:rounded-l-xl lg:rounded-tr-none">
                @endif
                <div class="p-8 text-cyan-900 font-semibold flex flex-col gap-5">
                    <p class="p-5 bg-white rounded-xl">{{ $product->desc }}</p>
                    <div class="flex justify-between items-center mb-5">
                        <div>
                            <p class="text-lg"><i class="fa-solid fa-location-dot w-4"></i>
                                {{ $product->provider->title }}</p>
                            <p class="text-xl"><i class="fa-solid fa-tag w-4"></i>
                                &euro; {{ $product->price }}</p>
                        </div>
                        <p class="text-3xl flex items-center gap-1"><i class="fa-solid fa-star text-xl pb-1"></i> 4.5
                        </p>
                    </div>

                    {{-- checkout button --}}
                    @auth
                        <form action="{{ route('checkout', $product) }}"
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

        {{-- provider info --}}
        <div class="bg-cyan-900">
            <div class="container text-white pb-28">
                <h2 class="primary-heading text-center pt-20 pb-10 text-white">Apie teikėją</h2>
                <p>{{ $product->provider->desc }}</p>
            </div>
        </div>

        {{-- review --}}
        <div class="bg-[#a7d2ca2a]">
            <div class="container text-white pb-20" id="review">

                <h2 class="primary-heading text-cyan-900 text-center pt-20 pb-10">Palikite atsiliepimą</h2>

                <form method="POST" action="{{ route('make-review', $product) }}" class="w-1/2 mx-auto">
                    @csrf

                    <x-form.label for="reviewer" :value="__('Vardas')" />
                    <x-form.input id="reviewer" class="block mt-1 w-full mb-4 text-gray-500" type="text"
                        name="reviewer" :value="old('reviewer')" />

                    @error('reviewer')
                        <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                            {{ $message }}
                        </p>
                    @enderror

                    <fieldset>
                        <legend class="block font-medium text-sm text-gray-500">Įvertinimas:</legend>
                        <div class="flex gap-4">

                            <div class="flex gap-2 items-center">
                                <input id="rate" class="mt-1 mb-2" type="radio" name="rate"
                                    :value="old('rate')" />
                                <x-form.label for="rate" :value="__('1')" class="inline-block" />
                            </div>
                            <div class="flex gap-2 items-center">
                                <input id="rate" class="mt-1 mb-2" type="radio" name="rate"
                                    :value="old('rate')" />
                                <x-form.label for="rate" :value="__('2')" class="inline-block" />
                            </div>
                            <div class="flex gap-2 items-center">
                                <input id="rate" class="mt-1 mb-2" type="radio" name="rate"
                                    :value="old('rate')" />
                                <x-form.label for="rate" :value="__('3')" class="inline-block" />
                            </div>
                            <div class="flex gap-2 items-center">
                                <input id="rate" class="mt-1 mb-2" type="radio" name="rate"
                                    :value="old('rate')" />
                                <x-form.label for="rate" :value="__('4')" class="inline-block" />
                            </div>
                            <div class="flex gap-2 items-center">
                                <input id="rate" class="mt-1 mb-2" type="radio" name="rate"
                                    :value="old('rate')" />
                                <x-form.label for="rate" :value="__('5')" class="inline-block" />
                            </div>
                        </div>
                    </fieldset>

                    @error('rate')
                        <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                            {{ $message }}
                        </p>
                    @enderror

                    <x-form.label for="review_text" :value="__('Komentaras:')" class="mt-3" />
                    <textarea name="review_text" id="review_text" rows="3"
                        class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                        focus:ring-cyan-100 text-gray-500">{{ old('review_text') }}</textarea>

                    @error('review_text')
                        <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                            {{ $message }}
                        </p>
                    @enderror

                    <button class="mt-4 mb-10 secondary-btn" type="submit">
                        Patvirtinti
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-front-layout>
