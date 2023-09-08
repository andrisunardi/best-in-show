@section('meta')
    @include('layouts.meta')

    @stack('meta')
@endsection

@section('vendors')
    @include('vendors.jquery')

    @include('vendors.bootstrap')

    {{-- @include('vendors.autonumeric') --}}

    @include('vendors.clarity-microsoft-tag')

    @include('vendors.disabled-ctrl-u-and-f12')

    @include('vendors.disabled-right-click-image')

    @include('vendors.disabled-right-click')

    @include('vendors.disabled-zoom')

    @include('vendors.facebook-page')

    @include('vendors.font-awesome')

    {{-- @include('vendors.getbutton-io') --}}

    {{-- @include('vendors.google-adsense') --}}

    @include('vendors.google-analytics')

    @include('vendors.google-tag-manager')

    @include('vendors.pace')

    {{-- @include('vendors.livechat-tawk') --}}

    {{-- @include('vendors.lozad') --}}

    {{-- @include('vendors.select2') --}}

    @include('vendors.snowflakes')
@endsection

@section('css')
    @stack('css')

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('script')
    @stack('script')

    <script src="{{ asset('js/color-modes.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection

<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env('APP_LANGUAGE') }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ env('APP_LANGUAGE') }}" data-bs-theme="auto">

<head>
    @yield('meta')

    <title>
        @if (!Route::is('index'))
            @yield('title') |
        @endif {{ env('APP_TITLE') }}
    </title>

    @yield('css')

    @yield('vendors')

    @livewireStyles
</head>

<body>
    @livewire('layouts.header')

    @if (!trim($__env->yieldContent('code')))
        <main>
            @yield('content')
        </main>
    @else
        @livewire('layouts.error')
    @endif

    @livewire('layouts.footer')

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
