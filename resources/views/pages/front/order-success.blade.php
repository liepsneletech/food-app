<x-front-layout>
    <div class="bg-gray-100 min-h-[85vh] py-12">
        <h1 class="primary-heading pb-7 pt-5 text-3xl text-center ">
            Užsakymas sėkmingas
        </h1>

        <div class="container flex justify-center">
            <div class="grid grid-cols-1 md:grid-cols-2 justify-start bg-white w-[720px] rounded-lg overflow-hidden">
                <img src="/assets/img/order-success-img.jpg" alt="Image" class="inline-block bg-cover w-full h-full">
                <div class="flex flex-col gap-5 justify-between p-10 pb-6">
                    <div>
                        <b class="text-cyan-900 text-xl">Ačiū, {{ Auth::user()->name }}, </b>
                        <p class="mb-10 text-cyan-900">Jūs sėkmingai pateikėte užsakymą.</p>
                        <div class="flex flex-col items-center justify-end gap-3 p-3">
                            <a href="{{ route('user-orders') }}" class="primary-btn py-1.5">
                                {{ __('Mano užsakymai') }}
                            </a>
                            <a href="{{ route('products-index') }}" class="secondary-btn">
                                {{ __('Grįžti į produktus') }}
                            </a>
                        </div>
                    </div>
                    <h3 class="text-cyan-900 text-center">
                        Kilus klausimams, drąsiai kreipkitės!
                    </h3>
                </div>
            </div>
        </div>
    </div>
</x-front-layout>
