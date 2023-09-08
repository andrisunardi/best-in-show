@props([
    'key' => null,
    'text' => null,
    'icon' => null,
    'position' => 'left',
    'type' => 'button',
    'color' => 'primary',
    'size' => 'btn-md',
    'width' => 'w-100',
    'confirm' => null,
])

<button type="{{ $type }}" class="btn btn-{{ $color }} {{ $size }} {{ $width }}"
    @if ($type != 'submit') wire:click="{{ $key }}" @endif wire:loading.attr="disabled"
    @if ($confirm) onclick="return confirm('{{ $confirm }} ?') || event.stopImmediatePropagation()" @endif>

    @if ($icon && $position == 'left')
        <span class="{{ $icon }} fa-fw"></span>
    @endif

    {{ $text }}

    @if ($icon && $position == 'right')
        <span class="{{ $icon }} fa-fw"></span>
    @endif

    <div wire:loading wire:target="{{ $key }}">
        <span class="fas fa-spinner fa-spin"></span>
    </div>
</button>
