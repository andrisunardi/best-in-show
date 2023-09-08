@props([
    'key' => null,
    'icon' => null,
])

<div
    class="input-group-text @if ($errors->any()) {{ $errors->has($key) ? 'border-danger' : 'border-success' }} @endif">
    <span
        class="{{ $icon }} fa-fw @if ($errors->any()) {{ $errors->has($key) ? 'text-danger' : 'text-success' }} @endif">
    </span>
</div>
