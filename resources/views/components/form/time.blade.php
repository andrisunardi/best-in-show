@props([
    'key' => 'time',
    'title' => trans('validation.attributes.time'),
    'icon' => 'fas fa-clock',
    'type' => 'time',
    'step' => 1,
    'required' => false,
    'label' => true,
])

<x-form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :step="$step"
    :required="$required" :label="$label" />
