@props([
    'href' => null,
    'src' => null,
    'target' => '_blank',
    'draggable' => 'false',
    'class' => 'img-thumbnail w-100 mt-3',
])

<a draggable="{{ $draggable }}" href="{{ $href ?? $src }}" target="{{ $target }}">
    <img draggable="{{ $draggable }}" src="{{ $src }}" class="{{ $class }}" />
</a>
