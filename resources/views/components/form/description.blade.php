@props([
    'key' => 'description',
    'title' => trans('validation.attributes.description'),
    'icon' => 'fas fa-file-lines',
    'minlength' => 1,
    'maxlength' => 65535,
    'required' => false,
    'label' => true,
    'autocapitalize' => 'on',
    'autofocus' => false,
])

<x-form.textarea :key="$key" :title="$title" :icon="$icon" :minlength="$minlength"
    :maxlength="$maxlength" :required="$required" :label="$label" :autocapitalize="$autocapitalize" :autofocus="$autofocus" />
