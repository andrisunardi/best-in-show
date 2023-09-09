@props([
    'class' => 'text-decoration-none',
    'value' => null,
    'navigate' => false,
])

<x-link :class="$class" :text="$value" :href="'tel:+' . Str::phone($value)" :navigate="$navigate" />
