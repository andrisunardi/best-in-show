@props([
    'class' => null,
    'text' => null,
    'icon' => null,
    'href' => null,
    'value' => null,
])

@php
    $class = isset($class) ? $class : ($value ? 'btn btn-sm btn-danger w-100' : 'btn btn-sm btn-success w-100');
@endphp

<x-link :class="$class" :text="Str::translate(Str::active(!$value))" :icon="$value ? 'fas fa-times' : 'fas fa-check'" :href="$href" />
