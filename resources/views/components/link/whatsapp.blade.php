@props([
    'class' => 'text-decoration-none',
    'value' => null,
    'text' => null,
    'target' => '_blank',
    'navigate' => false,
])

<x-components::link :class="$class" :text="$value" :href="'https://api.whatsapp.com/send?phone=' . Utils::phone($value) . '&text=' . $text" :target="$target" :navigate="$navigate" />
