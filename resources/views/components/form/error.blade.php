@props(['messages'])

@if ($messages)
    <ul>
        @foreach ((array) $messages as $message)
            <li class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm">{{ $message }}</li>
        @endforeach
    </ul>
@endif
