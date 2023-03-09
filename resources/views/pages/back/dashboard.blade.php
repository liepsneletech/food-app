<x-back-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <h2 class="text-xl font-semibold leading-tight">
                {{ __('Skydelis') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 overflow-hidden bg-white rounded-md shadow-md">
        <span>{{ Auth::user()->name }},</span>{{ __(' sveikiname prisijungus!') }}
    </div>
</x-back-layout>
