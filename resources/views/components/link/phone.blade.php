@props([
    'class' => 'text-decoration-none',
    'value' => null,
    'navigate' => false,
])

<x-components::link :class="$class" :text="$value" :href="'tel:+' . Utils::phone($value)" :navigate="$navigate" />
