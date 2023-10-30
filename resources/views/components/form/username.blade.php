@props([
    'key' => 'username',
    'title' => trans('validation.attributes.username'),
    'icon' => 'fas fa-user',
    'type' => 'text',
    'minlength' => 1,
    'maxlength' => 255,
    'required' => false,
    'label' => true,
    'autocapitalize' => 'on',
    'autofocus' => false,
])

<x-components::form.input :key="$key" :title="$title" :icon="$icon" :type="$type" :minlength="$minlength"
    :maxlength="$maxlength" :required="$required" :label="$label" :autocapitalize="$autocapitalize" :autofocus="$autofocus" />
