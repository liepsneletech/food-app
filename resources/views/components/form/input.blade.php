@props([
    'disabled' => false,
    'withicon' => false,
])

@php
    $withiconClasses = $withicon ? 'pl-11 pr-4' : 'px-4';
@endphp

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge([
    'class' =>
        $withiconClasses .
        ' py-2 border-gray-300 rounded-full focus:border-gray-300 focus:ring
            focus:ring-cyan-100 placeholder:text-gray-400',
]) !!}>
