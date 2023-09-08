@props([
    'class' => null,
    'text' => null,
    'icon' => null,
    'position' => 'left',
    'href' => null,
    'target' => null,
    'confirm' => null,
    'download' => false,
])

<a draggable="false" class="{{ $class }}" href="{{ $href }}" target="{{ $target }}"
    @if ($confirm) onclick="return confirm('{{ $confirm }} ?')" @endif
    @if ($download) download @endif>

    @if ($icon && $position == 'left')
        <span class="{{ $icon }} fa-fw"></span>
    @endif

    {{ $text }}

    @if ($icon && $position == 'right')
        <span class="{{ $icon }} fa-fw"></span>
    @endif
</a>
