@props([
    'class' => 'btn btn-dark w-100',
    'text' => trans('index.view'),
    'icon' => 'fas fa-eye',
    'href' => null,
    'target' => null,
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" :target="$target" />
