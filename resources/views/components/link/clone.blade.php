@props([
    'class' => 'btn btn-sm btn-info text-white w-100',
    'text' => trans('index.clone'),
    'icon' => 'fas fa-clone',
    'href' => null,
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" />
