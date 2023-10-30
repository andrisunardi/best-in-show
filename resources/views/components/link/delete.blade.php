@props([
    'class' => 'btn btn-sm btn-danger w-100',
    'text' => trans('index.delete'),
    'icon' => 'fas fa-trash',
    'href' => null,
    'confirm' => trans('index.delete'),
    'navigate' => false,
])

<x-components::link :class="$class" :text="$text" :icon="$icon" :href="$href" :confirm="$confirm" :navigate="$navigate" />
