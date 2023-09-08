@props([
    'href' => null,
    'class' => 'btn btn-link btn-sm',
    'icon' => 'fas fa-external-link',
    'target' => '_blank',
    'navigate' => false,
])

<x-link :href="$href" :class="$class" :icon="$icon" :target="$target" :navigate="$navigate" :navigate="$navigate" />
