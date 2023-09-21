@props([
    'class' => 'btn btn-sm btn-success w-100',
    'text' => trans('index.update'),
    'icon' => 'fas fa-edit',
    'href' => null,
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" />
