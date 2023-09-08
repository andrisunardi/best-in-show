@props([
    'key' => 'number',
    'title' => trans('validation.attributes.number'),
    'icon' => 'fas fa-sort',
    'type' => 'number',
    'min' => 1,
    'max' => 1000000000,
    'minlength' => 1,
    'maxlength' => 10,
    'required' => false,
    'label' => true,
    'autofocus' => false,
])

<x-form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :min="$min"
    :max="$max" :minlength="$minlength" :maxlength="$maxlength" :required="$required" :label="$label" :autofocus="$autofocus" />
