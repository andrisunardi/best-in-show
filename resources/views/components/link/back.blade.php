@props([
    'class' => 'btn btn-primary w-100',
    'text' => trans('index.back'),
    'icon' => 'fas fa-arrow-left',
    'href' => null,
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="url()->previous() == url()->current() ? $href : url()->previous()" />
