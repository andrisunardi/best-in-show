@props([
    'class' => 'btn btn-sm btn-danger w-100',
    'text' => trans('index.delete_permanent_all'),
    'icon' => 'fas fa-dumpster-fire',
    'href' => null,
    'confirm' => trans('index.delete_permanent_all'),
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" :confirm="$confirm" />
