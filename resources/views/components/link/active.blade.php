@props([
    'class' => null,
    'text' => null,
    'icon' => null,
    'href' => null,
    'value' => null,
    'navigate' => false,
])

@php
    $class = isset($class) ? $class : ($value ? 'btn btn-sm btn-danger w-100' : 'btn btn-sm btn-success w-100');
@endphp

<x-components::link :class="$class" :text="Utils::translate(Utils::active(!$value))" :icon="$value ? 'fas fa-times' : 'fas fa-check'" :href="$href" :navigate="$navigate" />
