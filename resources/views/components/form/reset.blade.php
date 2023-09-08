@props([
    'key' => 'resetFields',
    'text' => trans('index.reset'),
    'icon' => 'fas fa-undo',
    'color' => 'warning',
    'confirm' => null,
])

<x-button :key="$key" :text="$text" :icon="$icon" :color="$color" :confirm="$confirm" />
