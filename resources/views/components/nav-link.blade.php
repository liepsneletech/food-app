@props(['active'])

@php
    $classes = $active ?? false ? 'inline-flex items-center border-b-2 border-cyan-500 text-medium font-medium leading-5 text-gray-700 focus:outline-none focus:border-cyan-500 transition duration-150 ease-in-out' : 'inline-flex items-center border-b-2 border-transparent text-md font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-cyan-500 focus:outline-none focus:text-gray-700 focus:border-cyan-500 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
