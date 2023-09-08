@props([
    'key' => 'search',
    'title' => trans('validation.attributes.search'),
    'icon' => 'fas fa-search',
    'type' => 'search',
    'label' => true,
])

@if ($label)
    <x-form.label :key="$key" :title="$title" />
@endif

<div class="input-group">
    @if ($icon)
        <div class="input-group-text">
            <span class="{{ $icon }} fa-fw"></span>
        </div>
    @endif

    <input class="form-control" wire:model="{{ $key }}" id="{{ $key }}" type="{{ $type }}"
        placeholder="{{ $title }}" />
</div>
