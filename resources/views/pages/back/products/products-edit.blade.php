<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-6">
        <div class="container">
            <form method="post" action="{{ route('admin-products-update', $product) }}" class="w-1/2 mx-auto"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <h1 class="primary-heading mb-6">Produkto redagavimas</h1>

                <!-- Success message -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <x-form.label for="title" :value="__('Pavadinimas')" />
                <x-form.input id="title" class="block mt-1 w-full mb-2" type="text" name="title"
                    value='{{ $product->title }}' autofocus />

                @error('title')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="price" :value="__('Kaina (Eur)')" />
                <x-form.input id="price" class="block mt-1 w-full mb-2" type="text" name="price"
                    value="{{ $product->price }}" />

                @error('price')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="provider_id" :value="__('Teikėjas')" />
                <select id="provider_id"
                    class="block w-full border-gray-300 rounded-full focus:border-gray-300 focus:ring
                    focus:ring-cyan-100 placeholder:text-gray-400 mb-5"
                    type="text" name="provider_id">
                    <option>-- Teikėjas nepasirinktas</option>
                    @foreach ($providers as $provider)
                        <option value="{{ $provider->id }}" @if ($provider->id === $product->provider_id) selected @endif>
                            {{ $provider->title }}</option>
                    @endforeach
                </select>

                @error('provider_id')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="desc" :value="__('Aprašymas')" class="mt-3" />
                <textarea name="desc" id="desc" rows="3"
                    class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400 mb-3">{{ $product->desc }}</textarea>

                @error('desc')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <div class="flex items-center gap-5 p-5 border border-cyan-300 rounded-xl w-fit">
                    @if (isset($product->img))
                        <img src="{{ asset($product->img) }}" alt="product photo" class="w-[200px] rounded-xl">
                    @else
                        <img src="/assets/img/fallback-img.jpg" alt="product photo" class="w-[200px] rounded-xl">
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
