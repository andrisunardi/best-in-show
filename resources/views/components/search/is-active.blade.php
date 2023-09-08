@props([
    'key' => 'is_active',
    'title' => trans('validation.attributes.is_active'),
    'type' => 'checkbox',
])

<x-search.boolean :key="$key" :title="$title" :type="$type" />
