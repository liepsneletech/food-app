@props([
    'align' => 'right',
])

@php
    switch ($align) {
        case 'left':
            $alignmentClasses = 'origin-top-left left-0';
            break;
        case 'top':
            $alignmentClasses = 'origin-top';
            break;
        case 'right':
        default:
            $alignmentClasses = 'origin-top-right right-0';
            break;
    }
@endphp

<div {{ $attributes->merge(['class' => 'relative']) }} x-data="{ open: false }" x-on:click.away="open = false"
    x-on:close.stop="open = false">
    <div x-on:click="open = ! open">
        {{ $trigger }}
    </div>

    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95" class="absolute z-50 {{ $alignmentClasses }}"
        style="display: none;" x-on:click="open = false">
        <div class="bg-cyan-800 text-white text-sm z-10 rounded-xl w-[160px] p-4">
            {{ $content }}
        </div>
    </div>
</div>
