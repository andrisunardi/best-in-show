@props([
    'key' => null,
    'title' => null,
    'type' => 'radio',
    'name' => null,
    'label' => true,
    'second' => true,
])

@if ($label)
    <x-form.label :key="$key" :title="$title" />
@endif

<div class="form-check">
    <input class="form-check-input" type="{{ $type }}" wire:model="{{ $key }}" id="{{ $key }}_1"
        name="{{ $key }}" value="1">
    <label class="form-check-label" for="{{ $key }}_1">
        {{ $name ?? trans('index.yes') }}
    </label>
</div>

@if ($second)
    <div class="form-check">
        <input class="form-check-input" type="{{ $type }}" wire:model="{{ $key }}"
            id="{{ $key }}_0" name="{{ $key }}" value="0">
        <label class="form-check-label" for="{{ $key }}_0">
            {{ trans('index.no') }}
        </label>
    </div>
@endif
