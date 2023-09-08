@props([
    'key' => null,
    'title' => null,
    'icon' => null,
    'datas' => [],
    'valueAttribute' => 'id',
    'textAttribute' => 'name',
    'label' => true,
    'multiple' => false,
])

@if ($label)
    <x-form.label :key="$key" :title="$title" />
@endif

<div class="input-group">
    @if ($icon)
        <x-search.icon :icon="$icon" />
    @endif

    <select class="form-select select2" wire:model="{{ $key }}" id="{{ $key }}"
        {{ $multiple ? 'multiple' : null }}>
        <option value="">{{ trans('index.all') }} {{ $title }}</option>
        @foreach ($datas as $data)
            <option value="{{ $data[$valueAttribute] ?? $data }}"
                {{ ($data[$valueAttribute] ?? $data) == $this->$key ? 'selected' : null }}>
                {{ $data[$textAttribute] ?? $data }}
            </option>
        @endforeach
    </select>
</div>

@push('script')
    <script>
        $("#{{ $key }}").on("change", function() {
            @this.set("{{ $key }}", $(this).val())
        })
    </script>
@endpush
