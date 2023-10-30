@props([
    'data' => null,
])

<x-components::link :text="$data->name" :href="route('cms.configuration.user.view', [
    'user' => $data->id,
])" />
