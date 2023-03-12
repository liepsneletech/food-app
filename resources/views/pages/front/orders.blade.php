<x-front-layout>
    <div class="min-h-screen shadow-inner bg-[#a7d2ca2a]">
        <div class="bg-gray-100 min-h-screen pb-20">
            <div class="container">
                <h1 class="primary-heading pb-7 pt-14 text-center ">
                    Mano užsakymai
                </h1>
                <div class="grid gap-6">
                    @forelse ($orders as $order)
                        {{-- single order --}}
                        <article class="order w-full mx-auto border-l-8 border-cyan-500 bg-white  rounded-lg shadow-sm">
                            {{-- order head --}}
                            <div class="grid grid-cols-[repeat(7,auto)] items-center justify-between px-6 py-4">
                                <p class="text-gray-700"><b>Užsakymo ID:</b> <span>{{ $order->id }}</span></p>
                                <p class="text-gray-700"><b>Data:</b>
                                    <span>{{ $order->created_at->format('Y-m-d') }}</span>
                                </p>
                                <p class="text-gray-700"><b>Vardas:</b> <span>{{ $order->name }}</span></p>
                                <p class="text-gray-700"><b>Pavardė:</b> <span>{{ $order->surname }}</span>
                                </p>
                                <p class="text-gray-700"><b>Iš viso:</b> <span>{{ $order->meal->price }}
                                        &euro;</span>
                                </p>
                                <p
                                    class="@if ($order->status == 0) order-not-approved @elseif($order->status == 1) order-approved @else order-canceled @endif">
                                    @if ($order->status == 0)
                                        {{ 'Nepatvirtintas' }}
                                    @elseif ($order->status == 1)
                                        {{ 'Patvirtintas' }}
                                    @else
                                        {{ 'Atšauktas' }}
                                    @endif
                                </p>
                                {{-- accordion arrows --}}
                                <button class="order-btn">
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
</x-front-layout>
