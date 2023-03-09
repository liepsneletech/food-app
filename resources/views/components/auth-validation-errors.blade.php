@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <ul class="text-sm">
            @foreach ($errors->all() as $error)
                <li class="text-white bg-red-600 rounded-lg py-1 px-4 text-sm mb-2">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
