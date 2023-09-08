@props([
    'class' => 'btn btn-link text-decoration-none',
    'text' => null,
    'href' => null,
])

<x-link :class="$class" :text="$text" :href="$href" />
