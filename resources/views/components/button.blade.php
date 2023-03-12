@props([
    'variant' => '',
    'iconOnly' => false,
    'srText' => '',
    'href' => false,
    'size' => 'base',
    'disabled' => false,
    'pill' => false,
    'squared' => false,
])

@php
    
    $baseClasses = 'inline-flex items-center transition-colors font-medium select-none disabled:opacity-50 disabled:cursor-not-allowed focus:outline-none';
    
    switch ($variant) {
        case 'primary':
            $variantClasses = 'bg-gray-400 text-white hover:bg-gray-500';
            break;
        case 'secondary':
            $variantClasses = 'bg-cyan-600 text-white hover:bg-cyan-700';
            break;
        case 'neutral':
            $variantClasses = 'bg-white text-gray-500 hover:bg-gray-100';
            break;
        default:
            $variantClasses = 'bg-gray-200 text-gray-500 hover:bg-gray-500 hover:text-white';
    }
    
    switch ($size) {
        case 'sm':
            $sizeClasses = $iconOnly ? 'p-1.5' : 'px-2.5 py-1.5 text-sm';
            break;
        case 'base':
            $sizeClasses = $iconOnly ? 'p-2' : 'px-4 py-2 text-base';
            break;
        case 'lg':
        default:
            $sizeClasses = $iconOnly ? 'p-3' : 'px-5 py-2 text-xl';
            break;
    }
    
    $classes = $baseClasses . ' ' . $sizeClasses . ' ' . $variantClasses;
    
    if (!$squared && !$pill) {
        $classes .= ' rounded-md';
    } elseif ($pill) {
        $classes .= ' rounded-full';
    }
    
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }}>
        {{ $slot }}
        @if ($iconOnly)
            <span class="sr-only">{{ $srText ?? '' }}</span>
        @endif
    </a>
@else
    <button {{ $attributes->merge(['type' => 'submit', 'class' => $classes]) }}>
        {{ $slot }}
        @if ($iconOnly)
            <span class="sr-only">{{ $srText ?? '' }}</span>
        @endif
    </button>
@endif
