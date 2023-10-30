@props([
    'key' => 'video',
    'title' => trans('validation.attributes.video'),
    'icon' => 'fas fa-video',
    'type' => 'file',
    'required' => false,
    'label' => true,
    'accept' => env('ACCEPT_VIDEO'),
    'helper' => trans('index.format') . ' : ' . env('FORMAT_VIDEO') . ' | ' . trans('index.size') . ' : ' . env('SIZE_VIDEO'),
])

<x-components::form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :required="$required"
    :label="$label" :accept="$accept" :helper="$helper" />
