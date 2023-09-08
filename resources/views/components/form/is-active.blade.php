@props([
    'key' => 'is_active',
    'title' => trans('validation.attributes.is_active'),
])

<x-form.boolean :key="$key" :title="$title" />
