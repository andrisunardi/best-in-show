@props([
    'class' => 'btn btn-md btn-danger w-100',
    'text' => trans('index.delete_permanent_all'),
    'icon' => 'fas fa-dumpster-fire',
    'href' => null,
    'confirm' => trans('index.delete_permanent_all'),
    'navigate' => false,
])

<x-link :class="$class" :text="$text" :icon="$icon" :href="$href" :confirm="$confirm" :navigate="$navigate" />
