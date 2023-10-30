@if (!trim($__env->yieldContent('code')))
    @auth
        @livewire('c-m-s.layouts.header')

        <div class="container-fluid">
            <div class="row flex-nowrap">

                @livewire('c-m-s.layouts.sidebar')

                <div class="col-12 p-0 col-sm vh-100 border-start overflow-auto">
                    <div class="mx-3 mt-5 pt-4">
                        <div class="mt-2 d-block d-md-flex justify-content-md-between">
                            <div>
                                <h3>
                                    <span class="@yield('icon') fa-fw"></span>
                                    @yield('title')
                                </h3>
                            </div>
                            <div>
                                <div class="bg-body-secondary rounded px-3">
                                    <x-components::layouts.breadcrumbs />
                                </div>
                            </div>
                        </div>

                        {{ $slot }}
                    </div>

                    @livewire('c-m-s.layouts.footer')
                </div>
            </div>
        </div>
    @else
        {{ $slot }}
    @endauth
@else
    @livewire('c-m-s.layouts.error')
@endif
