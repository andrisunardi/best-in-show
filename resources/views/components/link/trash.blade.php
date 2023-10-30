@props([
    'class' => 'btn btn-danger w-100',
    'text' => trans('index.trash'),
    'icon' => 'fas fa-dumpster',
    'href' => null,
])

<x-components::link :class="$class" :text="$text" :icon="$icon" :href="$href" />
