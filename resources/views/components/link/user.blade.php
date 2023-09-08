@props([
    'data' => null,
])

<x-link :text="$data->name" :href="route('cms.configuration.user.view', [
    'user' => $data->id,
])" />
