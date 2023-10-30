@props([
    'class' => 'btn btn-sm btn-info text-white w-100',
    'text' => trans('index.download'),
    'icon' => 'fas fa-download',
    'href' => null,
    'download' => true,
    'navigate' => false,
])

<x-components::link :class="$class" :text="$text" :icon="$icon" :href="$href" :download="$download" :navigate="$navigate" />
