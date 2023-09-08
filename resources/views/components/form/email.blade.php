@props([
    'key' => 'email',
    'title' => trans('validation.attributes.email'),
    'icon' => 'fas fa-envelope',
    'type' => 'email',
    'minlength' => 1,
    'maxlength' => 255,
    'required' => false,
    'label' => true,
    'autocapitalize' => 'on',
    'autofocus' => false,
])

<x-form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :minlength="$minlength"
    :maxlength="$maxlength" :required="$required" :label="$label" :autocapitalize="$autocapitalize" :autofocus="$autofocus" />
