@section('meta')
    @include('layouts.cms.meta')

    @stack('meta')
@endsection

@section('vendors')
    @include('vendors.jquery')

    @include('vendors.bootstrap')

    {{-- @include('vendors.autonumeric') --}}

    {{-- @include('vendors.clarity-microsoft-tag') --}}

    {{-- @include('vendors.disabled-ctrl-u-and-f12') --}}

    {{-- @include('vendors.disabled-right-click-image') --}}

    {{-- @include('vendors.disabled-right-click') --}}

    {{-- @include('vendors.disabled-zoom') --}}

    {{-- @include('vendors.facebook-page') --}}

    @include('vendors.font-awesome')

    {{-- @include('vendors.getbutton-io') --}}

    {{-- @include('vendors.google-adsense') --}}

    @include('vendors.google-analytics')

    @include('vendors.google-tag-manager')

    @include('vendors.pace')

    @include('vendors.livechat-tawk')

    {{-- @include('vendors.lozad') --}}

    @include('vendors.select2')

    @include('vendors.snowflakes')
@endsection

@section('css')
    @stack('css')

    <link href="{{ asset('css/cms/app.css') }}" rel="stylesheet">
@endsection

@section('script')
    @stack('script')

    <script src="{{ asset('js/color-modes.js') }}"></script>
    <script src="{{ asset('js/cms/app.js') }}"></script>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env('APP_LANGUAGE') }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ env('APP_LANGUAGE') }}" data-bs-theme="light">

<head>
    @yield('meta')

    <title>
        @if (!Route::is('index'))
            @yield('title') |
        @endif
        {{ env('APP_TITLE') }}
    </title>

    @yield('css')

    @yield('vendors')

    @livewireStyles
</head>

<body>
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
                                        @include('layouts.breadcrumbs')
                                    </div>
                                </div>
                            </div>

                            @yield('content')
                        </div>

                        @livewire('c-m-s.layouts.footer')
                    </div>
                </div>
            </div>
        @else
            @yield('content')
        @endauth
    @else
        @livewire('c-m-s.layouts.error')
    @endif

    @yield('script')

    @livewireScripts
    @livewireChartsScripts

    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script src="{{ asset('vendors/sweetalert2-11.7.12/js/sweetalert2.js') }}"></script>
    <script src="{{ asset('vendor/livewire-alert/livewire-alert.js') }}"></script>
    <x-livewire-alert::scripts />
    <x-livewire-alert::flash />
</body>

</html>
