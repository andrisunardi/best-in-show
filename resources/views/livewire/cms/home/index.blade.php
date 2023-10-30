@section('title', trans('index.home'))
@section('icon', 'fas fa-home')

<main>
    <div class="row">
        @foreach ($menus as $menu)
            @role($menu['roles'])
                @can([$menu['permissions']])
                    <div class="col-6 col-md-4 col-xl-3 col-xxl-2">
                        <div class="card {{ $bgClasses[$loop->index % 6] }} text-white mb-4">
                            <div class="card-body text-center">
                                <div class="mt-3"><span class="{{ $menu['icon'] }} fa-3x"></span></div>
                                <div class="mt-3">
                                    <h4>{{ $menu['total'] }}</h4>
                                </div>
                                <div>{{ Utils::translate($menu['name']) }}</div>
                            </div>
                            <div class="card-footer d-flex align-items-center justify-content-between">
                                <a draggable="false" wire:navigate class="small text-white stretched-link"
                                    href="{{ route($menu['route']) }}">
                                    {{ trans('index.view_data') }}
                                </a>
                                <div class="small text-white">
                                    <span class="fas fa-angle-right"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endcan
            @endrole
        @endforeach
    </div>
</main>
