@props([
    'image' => null,
    'data' => null,
])

@php
    $imageUrl = null;

    if ($image) {
        $imageUrl = $image->temporaryUrl();
    } elseif ($data && $data->checkImage()) {
        $imageUrl = $data->assetImage();
    }
@endphp

@if ($imageUrl)
    <x-image :src="$imageUrl" />

    <div class="row mt-3">
        <div class="col-6 col-md-auto">
            <x-link.view :class="'btn btn-primary btn-sm w-100'" :href="$imageUrl" :target="'_blank'" />
        </div>

        <div class="col-6 col-md-auto">
            <x-link.download :class="'btn btn-info text-white btn-sm w-100'" :href="$imageUrl" />
        </div>

        @if ($imageUrl)
            <div class="col-12 col-md-auto mt-3 mt-lg-0">
                <x-button :key="'resetImage'" :text="trans('index.reset')" :icon="'fas fa-undo'" :color="'danger'" :size="'btn-sm'" />
            </div>
        @endif
    </div>
@endif
