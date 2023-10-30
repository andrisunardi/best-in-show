@props([
    'class' => 'btn btn-primary w-100',
    'text' => trans('index.add'),
    'icon' => 'fas fa-plus',
    'href' => null,
])

<x-components::link :class="$class" :text="$text" :icon="$icon" :href="$href" />
