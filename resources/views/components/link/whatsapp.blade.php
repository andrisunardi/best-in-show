@props([
    'class' => 'text-decoration-none',
    'value' => null,
    'text' => null,
    'target' => '_blank',
    'navigate' => false,
])

<x-link :class="$class" :text="$value" :href="'https://api.whatsapp.com/send?phone=' . Str::phone($value) . '&text=' . $text" :target="$target" :navigate="$navigate" />
