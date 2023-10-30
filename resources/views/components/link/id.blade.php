@props([
    'class' => 'btn btn-link text-decoration-none',
    'text' => null,
    'href' => null,
])

<x-components::link :class="$class" :text="$text" :href="$href" />
