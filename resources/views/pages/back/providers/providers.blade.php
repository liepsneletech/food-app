<x-back-layout>
    <div class="bg-gray-100 min-h-screen">
        <div class="container">

            <div class="flex flex-col gap-5 rounded-lg p-1 md:p-6 drop-shadow-sm w-full">
                <div class="grid grid-cols-1 items-center mb-6">
                    <h1
                        class="primary-heading justify-self-start lg:justify-self-center col-start-1 col-end-2 row-start-1 row-end-2">
                        Teikėjai
                    </h1>
                    <a href="{{ route('admin-providers-create', $provider) }}"
                        class="primary-btn flex justify-center items-center gap-1 text-sm uppercase justify-self-end col-start-1 col-end-2 row-start-1 row-end-2">
                        <i class="fa-regular fa-square-plus"></i> <span class="pt-1">Pridėti</span>
                    </a>
                </div>

                @forelse ($providers as $provider)
                    <div
                        class="grid grid-cols-1 lg:grid-cols-4 items-center justify-between gap-5 border-l-8 border-cyan-600 bg-white px-6 py-3 rounded-lg">
                        <p class="font-bold">{{ $provider->title }}</p>
                        <p>{{ $provider->address }}</p>
                        <p>{{ $provider->tel }}</p>

                        <div class="flex gap-3 justify-self-end">
                            <a href="{{ route('admin-providers-edit', $provider) }}">
                                <button type="submit" class="secondary-btn text-sm">
                                    <i class="fa-solid fa-pen"></i>
                                </button>
                            </a>
                            <form action="{{ route('admin-providers-delete', $provider) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="gray-btn py-1.5 text-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                @empty
                    <p>Nepridėtas nė vienas teikėjas.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-back-layout>
