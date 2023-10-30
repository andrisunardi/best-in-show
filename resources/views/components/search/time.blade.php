@props([
    'key' => 'time',
    'title' => trans('validation.attributes.time'),
    'icon' => 'fas fa-clock',
    'type' => 'time',
    'step' => 1,
    'label' => true,
])

<x-components::search :key="$key" :title="$title" :icon="$icon" :type="$type" :step="$step" :label="$label" />
