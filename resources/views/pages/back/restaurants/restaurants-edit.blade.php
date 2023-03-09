<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-8">
        <div class="container">
            <form method="POST" action="{{ route('admin-restaurants-update', $restaurant) }}" class="w-1/2 mx-auto"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <h1 class="primary-heading mb-6">Restorano redagavimas</h1>

                <!-- Success messages -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <x-form.label for="title" :value="__('Restorano pavadinimas')" />
                <x-form.input id="title" class="block mt-1 w-full mb-2" type="text" name="title"
                    value='{{ $restaurant->title }}' autofocus />

                @error('title')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="code" :value="__('Įmonės kodas')" />
                <x-form.input id="code" class="block mt-1 w-full mb-2" type="text" name="code"
                    value="{{ $restaurant->code }}" />

                @error('tel')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="address" :value="__('Adresas')" />
                <x-form.input id="address" class="block mt-1 w-full mb-2" type="text" name="address"
                    value="{{ $restaurant->address }}" />

                @error('address')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="menu_id" :value="__('Restoranas')" />
                <select id="menu_id"
                    class="block w-full border-gray-300 rounded-full focus:border-gray-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400"
                    type="text" name="menu_id">
                    <option selected disabled>-- Valgiaraštis nepasirinktas</option>
                    @forelse ($menus as $menu)
                        <option value="{{ $menu->id }}" @if ($menu->id === $meal->menu_id) selected @endif>
                            {{ $menu->title }}</option>
                    @empty
                    @endforelse
                </select>

                <x-form.label for="desc" :value="__('Aprašymas')" class="mt-3" />
                <textarea name="desc" id="desc" rows="3"
                    class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                    focus:ring-cyan-100 placeholder:text-gray-400 mb-3">{{ $restaurant->desc }}</textarea>

                @error('desc')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <div class="flex items-center gap-5 p-5 border border-cyan-300 rounded-xl w-fit">
                    @if (isset($restaurant->img))
                        <img src="{{ asset($restaurant->img) }}" alt="meal photo" class="w-[200px] rounded-xl">
                    @else
                        <img src="/assets/img/fallback-img.jpg" alt="meal photo" class="w-[200px] rounded-xl">
                    @endif

                    <div class="flex gap-2 px-3 items-center bg-amber-500 hover:bg-[#f5970b] rounded-full">
                        <x-form.label for="img" :value="__('Pakeisti nuotrauką')" class="py-2 text-white cursor-pointer" />
                        <input id="img" type="file" name="img" class="hidden mb-2" />
                    </div>
                </div>

                <button class="mt-5 mb-10 secondary-btn" type="submit">
                    Išsaugoti
                </button>
            </form>
        </div>
    </div>
</x-back-layout>
