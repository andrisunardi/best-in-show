<li class="nav-item d-none d-lg-inline">
    <a draggable="false" class="nav-link text-tertiary" href="javascript:;" wire_poll.1000ms>
        {{ trans('index.server_time') }} :
        {{ now()->isoFormat('dddd') }},
        {{ now()->isoFormat('LL') }}
        {{ now()->isoFormat('hh:mm:ss A') }}
    </a>
</li>
