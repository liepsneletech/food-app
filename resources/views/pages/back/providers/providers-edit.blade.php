<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-8">
        <div class="container">
            <form method="POST" action="{{ route('admin-providers-update', $provider) }}" class="w-1/2 mx-auto">
                @csrf
                @method('put')

                <h1 class="primary-heading mb-6">Teikėjo redagavimas</h1>

                <!-- Success messages -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <x-form.label for="title" :value="__('Teikėjo pavadinimas')" />
                <x-form.input id="title" class="block mt-1 w-full mb-2" type="text" name="title"
                    value='{{ $provider->title }}' autofocus />

                @error('title')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="address" :value="__('Adresas')" />
                <x-form.input id="address" class="block mt-1 w-full mb-2" type="text" name="address"
                    value="{{ $provider->address }}" />

                @error('address')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="tel" :value="__('Telefonas')" />
                <x-form.input id="tel" class="block mt-1 w-full mb-2" type="text" name="tel"
                    value="{{ $provider->tel }}" />

                @error('tel')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="desc" :value="__('Aprašymas')" class="mt-3" />
                <textarea name="desc" id="desc" rows="3"
                    class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                    focus:ring-cyan-100 placeholder:text-gray-400 mb-3">{{ $provider->desc }}</textarea>

                @error('desc')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <button class="mt-5 mb-10 secondary-btn" type="submit">
                    Išsaugoti
                </button>
            </form>
        </div>
    </div>
</x-back-layout>
