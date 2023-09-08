<!DOCTYPE html PUBLIC "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="{{ env('APP_LANGUAGE') }}" itemscope itemtype="http://schema.org/WebPage" xmlns="http://www.w3.org/1999/xhtml"
    xml:lang="{{ env('APP_LANGUAGE') }}" data-bs-theme="auto">

<head>
    <x-layouts.meta />

    @stack('meta')

    <title>
        @if (!Route::is('index'))
            @yield('title') |
        @endif
        {{ env('APP_TITLE') }}
    </title>

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

    @stack('script')
</body>

</html>
