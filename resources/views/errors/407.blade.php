@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "407 - Proxy Authentication Required")
@section("code", "407")
@section("message", "Proxy Authentication Required")
@section("description", "The client must first authenticate itself with the proxy")
