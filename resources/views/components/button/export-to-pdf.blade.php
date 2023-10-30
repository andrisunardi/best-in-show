@props([
    'key' => 'exportToPdf',
    'text' => trans('index.export_to_pdf'),
    'icon' => 'fas fa-file-pdf',
    'color' => 'danger',
    'confirm' => false,
])

<x-components::button :key="$key" :text="$text" :icon="$icon" :color="$color" :confirm="$confirm" />
