@props([
    'key' => 'is_active',
    'title' => trans('validation.attributes.is_active'),
])

<x-components::form.boolean :key="$key" :title="$title" />
