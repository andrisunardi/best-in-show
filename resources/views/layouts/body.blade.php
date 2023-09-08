@livewire('layouts.header')

@if (!trim($__env->yieldContent('code')))
    {{ $slot }}
@else
    @livewire('layouts.error')
@endif

@livewire('layouts.footer')
