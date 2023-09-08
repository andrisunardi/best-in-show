@props([
    'draggable' => 'false',
    'class' => null,
    'text' => null,
    'icon' => null,
    'position' => 'left',
    'href' => null,
    'target' => null,
    'confirm' => null,
    'download' => false,
    'navigate' => true,
])

<a draggable="{{ $draggable }}" class="{{ $class }}" href="{{ $href }}" target="{{ $target }}"
    @if ($confirm) onclick="return confirm('{{ $confirm }} ?')" @endif
    @if ($download) download @endif @if ($navigate) wire:navigate @endif>

    @if ($icon && $position == 'left')
        <span class="{{ $icon }} fa-fw"></span>
    @endif

    {{ $text }}

    @if ($icon && $position == 'right')
        <span class="{{ $icon }} fa-fw"></span>
    @endif
</a>
