@props([
    'key' => 'file',
    'title' => trans('validation.attributes.file'),
    'icon' => 'fas fa-file',
    'type' => 'file',
    'required' => false,
    'label' => true,
    'accept' => env('ACCEPT_FILE'),
    'helper' => trans('index.format') . ' : ' . env('FORMAT_FILE') . ' | ' . trans('index.size') . ' : ' . env('SIZE_FILE'),
])

<x-components::form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :required="$required"
    :label="$label" :accept="$accept" :helper="$helper" />
