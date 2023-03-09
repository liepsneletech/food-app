<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-6">
        <div class="container">
            <form method="POST" action="{{ route('admin-products-store') }}" class="w-1/2 mx-auto"
                enctype="multipart/form-data">
                @csrf

                <h1 class="primary-heading mb-6">Produkto pridėjimas</h1>

                <!-- Success messages -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <!-- Error if providers empty -->
                @if (session()->has('error'))
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('error') }}
                    </p>
                @endif

                <x-form.label for="title" :value="__('Pavadinimas')" />
                <x-form.input id="title" class="block mt-1 w-full mb-2" type="text" name="title"
                    :value="old('title')" autofocus />

                @error('title')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="price" :value="__('Kaina (Eur)')" />
                <x-form.input id="price" class="block mt-1 w-full mb-2" type="text" name="price"
                    :value="old('price')" />

                @error('price')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <div class="flex gap-2 px-5 my-4 items-center bg-cyan-800 rounded-full">
                    <span class="text-white"><i class="fa-regular fa-square-plus"></i></span>
                    <x-form.label for="img" :value="__('Pridėti nuotrauką')" class="py-2.5 text-white cursor-pointer" />
                    <input id="img" type="file" name="img" class="hidden mb-2" />
                </div>

                @error('img')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="provider_id" :value="__('Teikėjas')" />
                <select id="provider_id"
                    class="block w-full border-gray-300 rounded-full focus:border-gray-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400"
                    type="text" name="provider_id">
                    <option selected disabled>-- Teikėjas nepasirinktas</option>
                    @forelse ($providers as $provider)
                        <option value="{{ $provider->id }}">{{ $provider->title }}</option>
                    @empty
                    @endforelse
                </select>

                @error('provider_id')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="desc" :value="__('Aprašymas')" class="mt-3" />
                <textarea name="desc" id="desc" rows="3"
                    class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400">{{ old('desc') }}</textarea>

                @error('desc')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <button class="mt-4 mb-10 secondary-btn" type="submit">
                    Pridėti
                </button>
            </form>
        </div>
    </div>
</x-back-layout>
