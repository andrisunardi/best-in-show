@extends(Str::substr(Request::url(), 12, 3) == 'cms' ? 'layouts.cms.app' : 'layouts.app')

@section("title", "413 - Request Entity Too Large")
@section("code", "413")
@section("message", "Request Entity Too Large")
@section("description", "The server will not accept the request, because the request entity is too large")
