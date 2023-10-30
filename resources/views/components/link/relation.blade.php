@props([
    'class' => 'text-decoration-none',
    'text' => null,
    'href' => null,
    'target' => '_blank',
    'navigate' => false,
])

<x-components::link :class="$class" :text="$text" :href="$href" :target="$target" :navigate="$navigate" />
