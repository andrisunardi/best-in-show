<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env('APP_LANGUAGE') }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ env('APP_LANGUAGE') }}">

<head>
    <title>
        @if (!Route::is('index'))
            @yield('title') |
        @endif
        {{ env('APP_TITLE') }}
    </title>

    <x-components::layouts.meta />

    @stack('meta')

    @vite('resources/css/app.css')

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">

    @if (Route::is('cms.*') || explode('.', request()->getHost())[1] == 'cms')
        @include('layouts.cms.vendors')
    @else
        @include('layouts.vendors')
    @endif

    @stack('css')

    @if (Route::is('cms.*') || explode('.', request()->getHost())[1] == 'cms')
        @include('layouts.cms.css')
    @else
        @include('layouts.css')
    @endif
</head>

<body>
    @if (Route::is('cms.*') || explode('.', request()->getHost())[1] == 'cms')
        @include('layouts.cms.body')
    @else
        @include('layouts.body')
    @endif

    @if (Route::is('cms.*') || explode('.', request()->getHost())[1] == 'cms')
        @include('layouts.cms.script')
    @else
        @include('layouts.script')
    @endif

    <script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>

    @stack('script')
</body>

</html>
