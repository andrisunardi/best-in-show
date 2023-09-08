@props([
    'href' => null,
    'src' => null,
    'alt' => null,
    'draggable' => 'false',
    'width' => 'w-100',
    'target' => '_blank',
])

<a draggable="{{ $draggable }}" href="{{ $href ?? $src }}" target="{{ $target }}">
    <img draggable="{{ $draggable }}" src="{{ $src }}" class="{{ $width }}" alt="{{ $alt }}" />
</a>
