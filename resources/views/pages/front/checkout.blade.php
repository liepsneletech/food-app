<x-front-layout>
    <div class="min-h-screen shadow-inner bg-[#a7d2ca2a]">
        <h1 class="primary-heading pb-7 pt-14 text-center ">
            Apmokėjimas
        </h1>

        <div class="container flex justify-between border p-7 rounded-xl border-cyan-300 mb-16">
            {{-- meal info --}}
            <div class="container">
                <div class="grid grid-cols-1 lg:grid-cols-[30%_25%_auto] gap-7 p-7 bg-white rounded-xl">
                    @if (isset($meal->img))
                        <img src="{{ asset($meal->img) }}" alt="meal photo" class="w-full rounded-xl">
                    @else
                        <img src="/assets/img/fallback-img.jpg" alt="meal photo" class="w-full rounded-xl">
                    @endif
                    <div class="p-8 text-cyan-900 font-semibold flex flex-col gap-5">
                        <div class="flex justify-between items-center mb-5">
                            <div>
                                <p class="text-lg"><i class="fa-solid fa-location-dot w-4"></i>
                                    {{ $meal->restaurant->title }}</p>
                                <p class="text-xl"><i class="fa-solid fa-tag w-4"></i>
                                    &euro; {{ $meal->price }}</p>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('make-order', $meal) }}" method="post">
                        @csrf

                        <div>
                            <x-form.label for="name" :value="__('Vardas')" />
                            <x-form.input id="name" class="block mt-1 w-full mb-2" type="text" name="name"
                                :value="old('name')" />
                        </div>

                        <div>
                            <x-form.label for="surname" :value="__('Pavardė')" />
                            <x-form.input id="surname" class="block mt-1 w-full mb-2" type="text" name="surname"
                                :value="old('surname')" />
                        </div>

                        <div>
                            <x-form.label for="email" :value="__('El. paštas')" />
                            <x-form.input id="email" class="block mt-1 w-full mb-6" type="email" name="email"
                                :value="old('email')" />
                        </div>

                        <div class="flex align-center justify-between gap-4 flex-nowrap">
                            {{-- back button --}}
                            <div>
                                <a href="{{ route('meals-index') }}" class="gray-btn inline-block">
                                    {{ __('Grįžti') }}
                                </a>
                            </div>

                            {{-- confirmation button --}}
                            <button class="secondary-btn bg-cyan-900 hover:bg-cyan-800" type="submit">
                                Apmokėti
                            </button>
                        </div>
                    </form>

                </div>

            </div>
</x-front-layout>


{{-- action="{{ route('confirm-order', $meal) }}" --}}
