@props([
    'class' => 'text-decoration-none',
    'value' => null,
    'navigate' => false,
])

<x-link :class="$class" :text="$value" :href="'sms:+' . Str::phone($value)" :navigate="$navigate" />
