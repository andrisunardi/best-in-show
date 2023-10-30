@props([
    'class' => 'btn btn-sm btn-success w-100',
    'text' => trans('index.edit'),
    'icon' => 'fas fa-edit',
    'href' => null,
])

<x-components::link :class="$class" :text="$text" :icon="$icon" :href="$href" />
