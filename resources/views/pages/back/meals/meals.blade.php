<x-back-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="container">

            <div class="flex flex-col gap-5 rounded-lg p-1 md:p-6 drop-shadow-sm w-full">
                <div class="grid grid-cols-1 items-center mb-6">
                    <h1
                        class="primary-heading justify-self-start lg:justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                        Patiekalai
                    </h1>
                    <a href="{{ route('admin-meals-create', $meal) }}"
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

                @forelse ($meals as $meal)
                    <div
                        class="grid grid-cols-1 lg:grid-cols-5 items-center justify-between gap-5 border-l-8 border-cyan-600 bg-white px-6 py-3.5 rounded-lg">
                        <p>{{ $meal->title }}</p>
                        <p>&euro;{{ $meal->price }}</p>
                        @if (isset($meal->img))
                            <img src="{{ asset($meal->img) }}" alt="meal photo" class="w-[200px] rounded-xl">
                        @else
                            <img src="/assets/img/fallback-img.jpg" alt="meal photo" class="w-[200px] rounded-xl">
                        @endif

                        <p class="font-bold">Restoranas: {{ $meal->restaurant->title }}</p>

                        <div class="flex gap-3 justify-self-end">
                            <a href="{{ route('admin-meals-edit', $meal) }}">
                                <button type="submit" class="secondary-btn text-sm py-2">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </a>
                            <form action="{{ route('admin-meals-delete', $meal) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gray-btn py-2 text-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-500">Nepridėtas nė vienas patiekalas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-back-layout>
