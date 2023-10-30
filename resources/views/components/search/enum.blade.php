@props([
    'key' => null,
    'title' => null,
    'icon' => null,
    'datas' => [],
    'valueAttribute' => 'value',
    'textAttribute' => 'name',
    'label' => true,
    'multiple' => false,
])

@if ($label)
    <x-components::form.label :key="$key" :title="$title" />
@endif

<div class="input-group">
    @if ($icon)
        <x-components::search.icon :icon="$icon" />
    @endif

    <select class="form-select select2" wire:model="{{ $key }}" id="{{ $key }}"
        {{ $multiple ? 'multiple' : null }}>
        <option value="">{{ trans('index.all') }} {{ $title }}</option>
        @foreach ($datas as $data)
            <option value="{{ $data->$valueAttribute }}" {{ $data->$valueAttribute == $this->$key ? 'selected' : null }}>
                {{ Utils::translate($data->$textAttribute) }}
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
