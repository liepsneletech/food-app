<x-back-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="container">

            <div class="flex flex-col gap-5 rounded-lg p-1 md:p-6 drop-shadow-sm w-full">
                <div class="grid grid-cols-1 items-center mb-6">
                    <h1
                        class="primary-heading justify-self-start lg:justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                        Produktai
                    </h1>
                    <a href="{{ route('admin-products-create', $product) }}"
                        class="primary-btn text-sm uppercase flex justify-center items-center gap-1 justify-self-end col-start-1 col-end-2 row-start-1 row-end-2">
                        <i class="fa-regular fa-square-plus"></i>
                        <span class="pt-1">Pridėti</span>
                    </a>
                </div>

                <!-- Success message -->
                @if (session()->has('success'))
                    <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                        {{ Session::get('success') }}
                    </p>
                @endif

                @forelse ($products as $product)
                    <div
                        class="grid grid-cols-1 lg:grid-cols-5 items-center justify-between gap-5 border-l-8 border-cyan-600 bg-white px-6 py-3.5 rounded-lg">
                        <p>{{ $product->title }}</p>
                        <p>&euro;{{ $product->price }}</p>
                        @if (isset($product->img))
                            <img src="{{ asset($product->img) }}" alt="product photo" class="w-[200px] rounded-xl">
                        @else
                            <img src="/assets/img/fallback-img.jpg" alt="product photo" class="w-[200px] rounded-xl">
                        @endif

                        <p class="font-bold">Teikėjas: {{ $product->provider->title }}</p>

                        <div class="flex gap-3 justify-self-end">
                            <a href="{{ route('admin-products-edit', $product) }}">
                                <button type="submit" class="secondary-btn text-sm py-2">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </a>
                            <form action="{{ route('admin-products-delete', $product) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gray-btn py-2 text-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Nepridėtas nė vienas produktas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-back-layout>
