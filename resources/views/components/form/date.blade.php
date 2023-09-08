@props([
    'key' => 'date',
    'title' => trans('validation.attributes.date'),
    'icon' => 'fas fa-calendar',
    'type' => 'date',
    'required' => false,
    'label' => true,
    'autofocus' => false,
])

<x-form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :required="$required"
    :label="$label" :autofocus="$autofocus" />
