@props([
    'href' => null,
    'class' => 'btn btn-link btn-sm',
    'icon' => 'fas fa-external-link',
    'target' => '_blank',
])

<x-link href="{{ $href }}" class="{{ $class }}" icon="{{ $icon }}"
    target="{{ $target }}" />
