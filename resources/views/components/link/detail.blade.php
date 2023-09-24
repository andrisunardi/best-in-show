@props([
    'class' => 'btn btn-sm btn-dark w-100',
    'text' => trans('index.detail'),
    'icon' => 'fas fa-list',
    'href' => null,
    'target' => null,
    'navigate' => true,
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" :target="$target" :navigate="$navigate" />
