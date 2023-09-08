@props([
    'key' => 'exportToExcel',
    'text' => trans('index.export_to_excel'),
    'icon' => 'fas fa-file-excel',
    'color' => 'success',
    'confirm' => false,
])

<x-button :key="$key" :text="$text" :icon="$icon" :color="$color" :confirm="$confirm" />
