@props([
    'key' => 'phone',
    'title' => trans('validation.attributes.phone'),
    'icon' => 'fas fa-phone',
    'type' => 'number',
    'min' => 0,
    'max' => 999999999999999,
    'minlength' => 1,
    'maxlength' => 15,
    'required' => false,
    'label' => true,
    'autocapitalize' => 'on',
    'autofocus' => false,
])

<x-form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :min="$min"
    :max="$max" :minlength="$minlength" :maxlength="$maxlength" :required="$required" :label="$label" :autocapitalize="$autocapitalize"
    :autofocus="$autofocus" />
