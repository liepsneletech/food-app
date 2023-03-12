<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-8">
        <div class="container">
            <form method="POST" action="{{ route('admin-restaurants-store') }}" class="w-1/2 mx-auto"
                enctype="multipart/form-data">
                @csrf

                <h1 class="primary-heading mb-6">Restorano pridėjimas</h1>

                <!-- Success messages -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                <x-form.label for="title" :value="__('Restorano pavadinimas')" />
                <x-form.input id="title" class="block mt-1 w-full mb-2" type="text" name="title"
                    :value="old('title')" autofocus />

                @error('title')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="code" :value="__('Įmonės kodas')" />
                <x-form.input id="code" class="block mt-1 w-full mb-2" type="text" name="code"
                    :value="old('code')" />

                @error('title')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="address" :value="__('Adresas')" />
                <x-form.input id="address" class="block mt-1 w-full mb-2" type="text" name="address"
                    :value="old('address')" />

                @error('address')
                    <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ $message }}
                    </p>
                @enderror

                <x-form.label for="menu_id" :value="__('Virtuvė')" />
                <select id="menu_id"
                    class="block w-full border-gray-300 rounded-full focus:border-gray-300 focus:ring
                focus:ring-cyan-100 placeholder:text-gray-400"
                    type="text" name="menu_id">
                    <option selected disabled>-- Virtuvė nepasirinkta</option>
                    @forelse ($menus as $menu)
                        <option value="{{ $menu->id }}">{{ $menu->title }}</option>
                    @empty
                    @endforelse
                </select>

                <x-form.label for="desc" :value="__('Aprašymas')" class="mt-3" />
                <textarea name="desc" id="desc" rows="3"
                    class="w-full rounded-2xl py-2 border-gray-300 focus:border-gray-300 focus:ring
                    focus:ring-cyan-100 placeholder:text-gray-400">{{ old('desc') }}</textarea>

                @error('desc')
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

                <button class="mt-5 mb-10 secondary-btn">
                    Pridėti
                </button>
            </form>
        </div>
    </div>
</x-back-layout>
