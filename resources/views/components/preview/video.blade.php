@props([
    'video' => null,
    'data' => null,
])

@php
    $videoUrl = null;

    if ($video) {
        $videoUrl = $video->temporaryUrl();
    } elseif ($data && $data->checkVideo()) {
        $videoUrl = $data->assetVideo();
    }
@endphp

@if ($videoUrl)
    <x-components::video :src="$videoUrl" />

    <div class="row mt-3">
        <div class="col-6 col-md-auto">
            <x-components::link.view :class="'btn btn-primary btn-sm w-100'" :href="$videoUrl" :target="'_blank'" />
        </div>

        <div class="col-6 col-md-auto">
            <x-components::link.download :class="'btn btn-info text-white btn-sm w-100'" :href="$videoUrl" />
        </div>

        @if ($videoUrl)
            <div class="col-12 col-md-auto mt-3 mt-lg-0">
                <x-components::button :key="'resetVideo'" :text="trans('index.reset')" :icon="'fas fa-undo'" :color="'danger'" :size="'btn-sm'" />
            </div>
        @endif
    </div>
@endif
