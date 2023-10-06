@props([
    'key' => null,
    'title' => null,
    'icon' => null,
    'type' => null,
    'min' => null,
    'max' => null,
    'minlength' => null,
    'maxlength' => null,
    'required' => false,
    'label' => true,
    'step' => null,
    'accept' => null,
    'helper' => null,
    'autocapitalize' => 'on',
    'autocomplete' => 'off',
    'autofocus' => false,
])

@if ($label)
    <x-form.label :key="$key" :title="$title" :required="$required" />
@endif

<div class="input-group">
    @if ($icon)
        <x-form.icon :key="$key" :icon="$icon" />
    @endif

    <input
        class="form-control @if ($errors->any()) {{ $errors->has($key) ? 'is-invalid' : 'is-valid' }} @endif"
        wire:model="{{ $key }}" id="{{ $key }}" type="{{ $type }}" min="{{ $min }}"
        max="{{ $max }}" minlength="{{ $minlength }}" maxlength="{{ $maxlength }}" step="{{ $step }}"
        accept="{{ $accept }}" placeholder="{{ $title }}" {{ $required ? 'required' : null }}
        autocapitalize="{{ $autocapitalize }}" autocomplete="{{ $autocomplete }}"
        {{ $autofocus ? 'autofocus' : null }} />

    @error($key)
        <div class="invalid-feedback">{{ $message }}</div>
    @else
        <div class="valid-feedback">{{ trans('validation.success') }}</div>
    @enderror
</div>

@if ($helper)
    <div class="form-text mb-3">
        {{ $helper }}
    </div>
@endif

@if ($type == 'file')
    <div class="alert alert-info w-100 mt-3" role="alert" wire:loading wire:target="{{ $key }}">
        {{ trans('index.please_wait_until_the_uploading_finished') }}
    </div>
@endif
