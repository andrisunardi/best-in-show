@props([
    'src' => null,
    'controls' => true,
])

<video src="{{ $src }}" class="w-100" {{ $controls ? 'controls' : null }}></video>
