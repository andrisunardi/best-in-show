@props([
    'key' => null,
    'title' => null,
    'datas' => [],
    'valueAttribute' => 'id',
    'textAttribute' => 'name',
    'required' => false,
    'label' => true,
])

@if ($label)
    <x-form.label :key="$key" :title="$title" :required="$required" />
@endif

@foreach ($datas as $data)
    <div class="form-check">
        <input
            class="form-check-input @if ($errors->any()) {{ $errors->has($key) ? 'is-invalid' : 'is-valid' }} @endif"
            type="checkbox" wire:model="{{ $key }}" id="{{ $key }}_{{ $data['id'] }}"
            name="{{ $key }}" value="{{ $data['id'] }}" {{ $required ? 'required' : null }}>

        <label class="form-check-label" for="{{ $key }}_{{ $data[$valueAttribute] }}"
            @if ($errors->any()) {{ $errors->has($key) ? 'text-danger' : 'text-success' }} @endif>
            {{ $data[$textAttribute] }}
        </label>

        @if ($loop->last)
            @error($key)
                <div class="invalid-feedback">{{ $message }}</div>
            @else
                <div class="valid-feedback">{{ trans('validation.success') }}</div>
            @enderror
        @endif
    </div>
@endforeach
