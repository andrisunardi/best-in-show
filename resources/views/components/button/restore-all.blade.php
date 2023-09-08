@props([
    'class' => 'btn btn-sm btn-success w-100',
    'text' => trans('index.restore_all'),
    'icon' => 'fas fa-trash-restore',
    'href' => null,
    'confirm' => trans('index.restore_all'),
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" :confirm="$confirm" />
