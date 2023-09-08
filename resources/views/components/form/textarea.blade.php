@props([
    'key' => null,
    'title' => null,
    'icon' => 'fas fa-file-lines',
    'minlength' => 1,
    'maxlength' => 65535,
    'required' => false,
    'label' => true,
    'autocapitalize' => 'on',
    'autofocus' => false,
])

@if ($label)
    <x-form.label :key="$key" :title="$title" :required="$required" />
@endif

<div class="input-group">
    @if ($icon)
        <x-form.icon :key="$key" :icon="$icon" />
    @endif

    <textarea
        class="form-control @if ($errors->any()) {{ $errors->has($key) ? 'is-invalid' : 'is-valid' }} @endif"
        wire:model="{{ $key }}" id="{{ $key }}" minlength="{{ $minlength }}"
        maxlength="{{ $maxlength }}" placeholder="{{ $title }}" {{ $required ? 'required' : null }}
        autocapitalize="{{ $autocapitalize }}" {{ $autofocus ? 'autofocus' : null }}>
    </textarea>

    @error($key)
        <div class="invalid-feedback">{{ $message }}</div>
    @else
        <div class="valid-feedback">{{ trans('validation.success') }}</div>
    @enderror
</div>
