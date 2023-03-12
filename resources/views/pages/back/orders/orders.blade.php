<x-back-layout>
    <div class="bg-gray-100 min-h-screen pt-10 pb-20">
        <div class="container px-5">
            <h1 class="primary-heading pb-7 text-center ">
                Visi užsakymai
            </h1>

            <!-- Success message -->
            @if (session()->has('success'))
                <p class="text-white bg-green-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                    {{ Session::get('success') }}
                </p>
            @endif
            <!-- Error message -->
            @if (session()->has('not'))
                <p class="text-white bg-red-500 rounded-lg py-1 px-4 text-sm mt-3 mb-5">
                    {{ Session::get('not') }}
                </p>
            @endif

            <div class="grid gap-6">
                @forelse ($orders as $order)
                    {{-- single order --}}
                    <article class="order w-full mx-auto border-l-8 border-cyan-500 bg-white  rounded-lg shadow-sm">
                        {{-- order head --}}
                        <div class="grid grid-cols-[0.7fr,1fr,1fr,1fr,1fr,1fr,0.1fr] items-center px-6 py-4">
                            <p class="text-gray-700"><b>ID:</b> <span>{{ $order->id }}</span></p>
                            <p class="text-gray-700"><b>Data:</b> <span>{{ $order->created_at->format('Y-m-d') }}</span>
                            </p>
                            <p class="text-gray-700"><span>{{ $order->name }}
                                    {{ $order->surname }}</span></p>
                            <p class="text-gray-700"><b>Iš viso:</b> <span>{{ $order->meal->price }} &euro;</span>
                            </p>
                            <p
                                class="justify-self-center @if ($order->status == 0) order-not-approved @elseif($order->status == 1) order-approved @else order-canceled @endif">
                                @if ($order->status == 0)
                                    {{ 'Nepatvirtintas' }}
                                @elseif ($order->status == 1)
                                    {{ 'Patvirtintas' }}
                                @else
                                    {{ 'Atšauktas' }}
                                @endif
                            </p>
                            <div class="flex gap-4 items-center text-lg">
                                <form action="{{ route('admin-orders-confirm', $order) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="text-2xl text-cyan-500"
                                        title="Patvirtinti užsakymą"><i class="fa-solid fa-check"></i></button>
                                </form>
                                <form action="{{ route('admin-orders-cancel', $order) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button type="submit" class="text-xl text-pink-500" title="Atšaukti užsakymą"><i
                                            class="fa-solid fa-ban"></i></button>
                                </form>
                                <form action="{{ route('admin-orders-delete', $order) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-xl text-gray-700" title="Ištrinti užsakymą"><i
                                            class="fa-solid fa-trash-can"></i></button>
                                </form>
                            </div>
                            {{-- accordion plus/minus btns --}}
                            <button class="order-btn" title="Papildoma informacija">
                                <span class="plus-icon text-2xl text-cyan-500"><i
                                        class="fa-regular fa-square-plus"></i></span>
                                <span class="minus-icon text-2xl text-cyan-500"><i
                                        class="fa-regular fa-square-minus"></i></span>
                            </button>
                        </div>
                        {{-- order body --}}
                        <div class="order-body bg-cyan-500 text-white rounded-br-lg">
                            <p class="p-5 order-text">{{ $order->meal->desc }}</p>
                        </div>
                    </article>
                @empty
                    <p>Užsakymų nėra</p>
                @endforelse
            </div>
        </div>
    </div>
</x-back-layout>
